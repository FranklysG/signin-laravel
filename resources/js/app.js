import './bootstrap';

$(document).ready(() => {

  const token = localStorage.getItem('token');
  const currentPath = window.location.pathname;
  const isNotDashboard = currentPath !== '/dashboard';
  const isDashboard = currentPath === '/dashboard';
  if (token && isNotDashboard) {
    window.location.href = '/dashboard';
  }
  if (!token && isDashboard) {
    window.location.href = '/';
  }

  $.ajaxSetup({
    beforeSend: function (xhr) {
      const token = localStorage.getItem('token');
      xhr.setRequestHeader('Authorization', `Bearer ${token}`);
    }
  });

  const headers = {
    Accept: 'application/json'
  }

  if (token && isDashboard) {
    $.ajax({
      url: 'api/users',
      method: 'GET',
      headers,
      dataType: 'json',
      success: function (response) {
        var lista = $('#list-all-users');
        lista.empty();

        response.data.forEach(function (item) {
          const name = item.name
          const hour = new Date(item.created_at)
          const address = item?.address?.street + ',' + item?.address?.district + ',' + item?.address?.city + ',' + item?.address?.postal_code
          const html = `
            <li class="px-4 py-4 sm:px-6 lg:px-8">
              <div class="flex items-center gap-x-3">
                <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-6 w-6 flex-none rounded-full bg-gray-800">
                <h3 class="flex-auto truncate text-sm font-semibold leading-6 text-white">${name}</h3>
                <time datetime="2023-01-23T11:00" class="flex-none text-xs text-gray-600">${hour.getDate()} / ${hour.getFullYear()}</time>
              </div>
              <p class="mt-3 truncate text-sm text-gray-500">Endereço:  <span class="text-gray-400">${address}</span></p>
            </li>
          `
          var listItem = $(html).text(item.nome);
          lista.append(listItem);
        });
      },
      error: function (xhr, status, error) {
        console.error("Ocorreu um erro: " + status + " " + error);
      }
    });
  }

  $('#register-btn').click(function () {
    const postalCode = $('#postal_code').val();
    const inputField = $('#postal_code');
    const passwordField = $('input[name="password"]');
    const confirmPasswordField = $('input[name="confirm_password"]');

    if (password !== confirm_password) {
      alert('As senhas não coincidem. Por favor, verifique.');
      passwordField.addClass('bg-red-200');
      confirmPasswordField.addClass('bg-red-200');
      return;
    } else {
      passwordField.removeClass('bg-red-200');
      confirmPasswordField.removeClass('bg-red-200');
    }

    $.ajax({
      type: 'GET',
      url: `https://viacep.com.br/ws/${postalCode}/json/`,
      success: function (response) {
        if (response.erro) {
          inputField.addClass('bg-red-200');
          alert('CEP inválido. Por favor, tente novamente.');
        } else {
          inputField.removeClass('bg-red-200');

          var data = $("#form-register").serialize();
          $.ajax({
            type: 'POST',
            url: '/api/register',
            data: data,
            success: function (response) {
              if (response.headerCode === 200) {
                localStorage.setItem('token', response.data.token);
                window.location.replace('/dashboard');
              } else if (response.status === 3) {
                console.log('error');
              }
            }
          });
        }
      },
      error: function (xhr, status, error) {
        inputField.addClass('bg-red-200');
        alert('Erro ao buscar CEP. Por favor, tente novamente.');
      }
    });
  });


  $('#signin-btn').click(() => {
    var data = $("#form-signin").serialize();

    $.ajax({
      type: 'POST',
      url: '/api/signin',
      data,
      success: function (response) {
        console.log(response.data)
        if (response.headerCode === 200) {
          localStorage.setItem('token', response.data.token)
          window.location.replace('/dashboard');
        } else if (response.status === 3) {
          console.log('error')
        }
      }
    })
  })

  $('#logout-btn').click(() => {
    $.ajax({
      type: 'POST',
      url: '/api/logout',
      headers,
      success: function (response) {
        localStorage.removeItem('token');
        window.location.href = '/';
      },
      error: function (xhr, status, error) {
        console.error('Erro ao deslogar:', error);
      }
    });
  })
  
  $('#reset-pass-btn').click(() => {
    var data = $("#form-reset-pass-btn").serialize();
    
    $.ajax({
      type: 'POST',
      url: '/api/forgot-password',
      headers,
      data,
      success: function (response) {
      },
      error: function (xhr, status, error) {
      }
    });
  })
});