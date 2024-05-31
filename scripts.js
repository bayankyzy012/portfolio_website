const translations = {
    kk: {
        systemLabel: 'Оқу жүйесі',
        loginPlaceholder: 'Логин',
        passwordPlaceholder: 'Құпия сөз',
        loginButton: 'кіру',
        resetPassword: 'Құпия сөзді өзгерту'
    },
    ru: {
        systemLabel: 'Учебная система',
        loginPlaceholder: 'Логин',
        passwordPlaceholder: 'Пароль',
        loginButton: 'войти',
        resetPassword: 'Изменить пароль'
    },
    en: {
        systemLabel: 'Learning System',
        loginPlaceholder: 'Login',
        passwordPlaceholder: 'Password',
        loginButton: 'login',
        resetPassword: 'Change password'
    }
};

function setLanguage(lang) {
    document.getElementById('system-label').innerText = translations[lang].systemLabel;
    document.getElementById('login-input').placeholder = translations[lang].loginPlaceholder;
    document.getElementById('password-placeholder').placeholder = translations[lang].passwordPlaceholder;
    document.getElementById('login-button').innerText = translations[lang].loginButton;
    document.getElementById('reset-password').innerText = translations[lang].resetPassword;

    // Update active button
    const buttons = document.querySelectorAll('.lang-btn');
    buttons.forEach(button => {
        button.classList.remove('active');
        if (button.textContent.trim() === lang) {
            button.classList.add('active');
        }
    });
}

function updateDomain() {
    const loginInput = document.getElementById('login-input').value;
    const domainSpan = document.getElementById('domain');
    const isNumeric = /^\d+$/.test(loginInput);

    if (isNumeric) {
        domainSpan.textContent = '@stud.satbayev.university';
    } else {
        domainSpan.textContent = '@satbayev.university';
    }
}
$('body').on('click', '.password-control', function(){
    if ($('#password-input').attr('type') == 'password'){
        $(this).addClass('view');
        $('#password-input').attr('type', 'text');
    } else {
        $(this).removeClass('view');
        $('#password-input').attr('type', 'password');
    }
    return false;
});





