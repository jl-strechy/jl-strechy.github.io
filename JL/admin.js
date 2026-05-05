(function () {
  const sessionKey = 'jl-admin-session';
  const taskKey = 'jl-admin-tasks';
  const loginForm = document.querySelector('[data-admin-login]');
  const logoutButton = document.querySelector('[data-admin-logout]');
  const adminPage = document.querySelector('[data-admin-page]');

  function isLoggedIn() {
    return localStorage.getItem(sessionKey) === 'active';
  }

  if (loginForm) {
    loginForm.addEventListener('submit', (event) => {
      event.preventDefault();
      const data = new FormData(loginForm);
      const email = String(data.get('email') || '').trim();
      const password = String(data.get('password') || '');
      const error = loginForm.querySelector('.admin-error');

      if (email === 'admin@jlstrechy.cz' && password === 'admin123') {
        localStorage.setItem(sessionKey, 'active');
        window.location.href = 'admin.html';
        return;
      }

      if (error) {
        error.textContent = 'Demo přihlášení: admin@jlstrechy.cz / admin123';
      }
    });
  }

  if (adminPage && !isLoggedIn()) {
    window.location.href = 'admin-login.html';
    return;
  }

  if (logoutButton) {
    logoutButton.addEventListener('click', () => {
      localStorage.removeItem(sessionKey);
      window.location.href = 'admin-login.html';
    });
  }

  document.querySelectorAll('.admin-tab').forEach((tab) => {
    tab.addEventListener('click', () => {
      const target = tab.dataset.tabTarget;
      document.querySelectorAll('.admin-tab').forEach((item) => item.setAttribute('aria-selected', String(item === tab)));
      document.querySelectorAll('.admin-panel').forEach((panel) => panel.classList.toggle('is-active', panel.id === target));
    });
  });

  const projectList = document.querySelector('[data-admin-projects]');
  if (projectList && window.JL_PROJECTS) {
    projectList.innerHTML = window.JL_PROJECTS.map((project, index) => `
      <div class="project-admin-item">
        <img src="${project.cover}" alt="${project.title}">
        <div>
          <strong>${project.title}</strong>
          <div class="muted">${project.images.length} fotografií</div>
        </div>
        <span class="status-pill">${index < 3 ? 'Top' : 'Publikováno'}</span>
      </div>
    `).join('');
  }

  const galleryCount = document.querySelector('[data-gallery-count]');
  const photoCount = document.querySelector('[data-photo-count]');
  if (window.JL_PROJECTS) {
    const totalPhotos = window.JL_PROJECTS.reduce((sum, project) => sum + project.images.length, 0);
    if (galleryCount) galleryCount.textContent = String(window.JL_PROJECTS.length);
    if (photoCount) photoCount.textContent = String(totalPhotos);
  }

  const taskList = document.querySelector('[data-task-list]');
  const taskForm = document.querySelector('[data-task-form]');
  const defaultTasks = [
    { id: 'contact', title: 'Doplnit skutečné kontaktní údaje', done: false },
    { id: 'forms', title: 'Připojit formulářovou službu', done: false },
    { id: 'refs', title: 'Vybrat hlavní reference', done: false }
  ];

  function loadTasks() {
    try {
      const saved = JSON.parse(localStorage.getItem(taskKey) || 'null');
      return Array.isArray(saved) ? saved : defaultTasks;
    } catch {
      return defaultTasks;
    }
  }

  function saveTasks(tasks) {
    localStorage.setItem(taskKey, JSON.stringify(tasks));
  }

  function renderTasks() {
    if (!taskList) return;
    const tasks = loadTasks();
    taskList.innerHTML = tasks.map((task) => `
      <div class="admin-task ${task.done ? 'is-done' : ''}" data-task-id="${task.id}">
        <input type="checkbox" ${task.done ? 'checked' : ''} aria-label="Hotovo">
        <input class="admin-task-title" type="text" value="${String(task.title).replace(/"/g, '&quot;')}" aria-label="Text úkolu">
        <button class="admin-icon-btn" type="button" aria-label="Smazat úkol">×</button>
      </div>
    `).join('');
  }

  if (taskList) {
    renderTasks();

    taskList.addEventListener('change', (event) => {
      const row = event.target.closest('.admin-task');
      if (!row) return;
      const tasks = loadTasks();
      const task = tasks.find((item) => item.id === row.dataset.taskId);
      if (!task) return;

      if (event.target.matches('input[type="checkbox"]')) {
        task.done = event.target.checked;
        saveTasks(tasks);
        renderTasks();
      }
    });

    taskList.addEventListener('input', (event) => {
      if (!event.target.matches('.admin-task-title')) return;
      const row = event.target.closest('.admin-task');
      const tasks = loadTasks();
      const task = tasks.find((item) => item.id === row.dataset.taskId);
      if (!task) return;
      task.title = event.target.value;
      saveTasks(tasks);
    });

    taskList.addEventListener('click', (event) => {
      if (!event.target.matches('.admin-icon-btn')) return;
      const row = event.target.closest('.admin-task');
      const tasks = loadTasks().filter((item) => item.id !== row.dataset.taskId);
      saveTasks(tasks);
      renderTasks();
    });
  }

  if (taskForm) {
    taskForm.addEventListener('submit', (event) => {
      event.preventDefault();
      const input = taskForm.elements.task;
      const title = String(input.value || '').trim();
      if (!title) return;
      const tasks = loadTasks();
      tasks.push({ id: `task-${Date.now()}`, title, done: false });
      saveTasks(tasks);
      input.value = '';
      renderTasks();
    });
  }
})();
