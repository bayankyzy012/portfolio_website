const translations = {
    kz: {
        personalData: "Жеке деректер",
        documentsInstructions: "Бөлек қужаттар",
        debt: "Қарыздар",
        clearanceSheet: "Өткізу парағы",
        contacts: "Байланыс",
        certificates: "Анықтамалар",
        diploma: "Дипломдау",
        scientificLibrary: "Ғылыми кітапхана",
        scientificDB: "Ғылыми деректер базасы",
        home: "Басты бет",
        versionForVisuallyImpaired: "Көзі көрмейтіндерге арналған нұсқа",
        logout: "Шығу",
        examRegistration: "Қашықтықтан емтиханға тіркелу",
        examRetake: "Емтиханды қайта тапсыру (FX)",
        noNewNotifications: "Сізде жаңа хабарламалар жоқ: 0",
        edo: "ЭДО",
        syllabus: "Силлабус",
        attendance: "Электронды сабаққа қатысу",
        individualPlan: "Жеке оқу жоспары",
        transcript: "Транскрипт",
        schedule: "Кесте",
        journal: "Журнал",
        examSchedule: "Емтихан кестесі",
        attestation: "Аттестация",
        generalSchedule: "Жалпы кесте",
        umkd: "УМКД",
        myStatus: "Менің Портфолиам",
        resetPassword: "Құпия сөзді өзгерту"
    },
    ru: {
        personalData: "Личные данные",
        documentsInstructions: "Отдельное достижение",
        debt: "Задолженность",
        clearanceSheet: "Обходной лист",
        contacts: "Контакты",
        certificates: "Справки",
        diploma: "Дипломирование",
        scientificLibrary: "Научная библиотека",
        scientificDB: "БД Научной библиотеки",
        home: "Главная",
        versionForVisuallyImpaired: "Версия для слабовидящих",
        logout: "Выход",
        examRegistration: "Регистрация на дистанционный экзамен",
        examRetake: "Пересдача экзамена (FX)",
        noNewNotifications: "У Вас нет новых уведомлений: 0",
        edo: "ЭДО",
        syllabus: "Силлабус",
        attendance: "Электронная посещаемость",
        individualPlan: "Индивидуальный учебный план",
        transcript: "Транскрипт",
        schedule: "Расписание",
        journal: "Журнал",
        examSchedule: "Расписание экзаменов",
        attestation: "Аттестация",
        generalSchedule: "Общее расписание",
        umkd: "УМКД",
        myStatus: "Мое Портфолио",
        resetPassword: "Изменить пароль"
    },
    en: {
        personalData: "Personal Data",
        documentsInstructions: "Documents/Instructions",
        debt: "Debt",
        clearanceSheet: "Clearance Sheet",
        contacts: "Contacts",
        certificates: "Certificates",
        diploma: "Diploma",
        scientificLibrary: "Scientific Library",
        scientificDB: "Scientific DB",
        home: "Home",
        versionForVisuallyImpaired: "Version for visually impaired",
        logout: "Logout",
        examRegistration: "Registration for the distance exam",
        examRetake: "Retake exam (FX)",
        noNewNotifications: "You have no new notifications: 0",
        edo: "EDO",
        syllabus: "Syllabus",
        attendance: "Electronic Attendance",
        individualPlan: "Individual Study Plan",
        transcript: "Transcript",
        schedule: "Schedule",
        journal: "Journal",
        examSchedule: "Exam Schedule",
        attestation: "Attestation",
        generalSchedule: "General Schedule",
        umkd: "UMKD",
        myStatus: "My Portfolio",
        resetPassword: "Reset Password"
    }
};

function setLanguage(lang) {
    const elements = document.querySelectorAll('[data-key]');
    elements.forEach(element => {
        const key = element.getAttribute('data-key');
        if (translations[lang][key]) {
            element.textContent = translations[lang][key];
        }
    });

    // Update active class for language buttons
    document.querySelectorAll('.lang-btn').forEach(button => {
        button.classList.remove('active');
    });
    document.querySelector(`.lang-btn[onclick="setLanguage('${lang}')"]`).classList.add('active');
}

// Set default language to Russian
document.addEventListener('DOMContentLoaded', () => {
    setLanguage('ru');
});

function addZero(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}


function getCurrentDateTime() {
    var today = new Date();
    var date = today.getFullYear()+'-'+addZero(today.getMonth()+1)+'-'+addZero(today.getDate());
    var time = addZero(today.getHours()) + ":" + addZero(today.getMinutes()) + ":" + addZero(today.getSeconds());
    return date + ' ' + time;
}

function updateDateTime() {
    var dateTimeElement = document.getElementById('current-date-time');
    if (dateTimeElement) {
        dateTimeElement.textContent = getCurrentDateTime();
    }
}

updateDateTime();
setInterval(updateDateTime, 1000);

function toggleDropdown() {
    console.log("Dropdown toggled"); // Check if the function is called
    document.getElementById("dropdown-menu").classList.toggle("show");
}

// Close dropdown if clicked outside
window.onclick = function(event) {
    console.log("Clicked outside"); // Check if the event handler is triggered
    if (!event.target.matches('.dropdown-toggle')) {
        var dropdowns = document.getElementsByClassName("dropdown-menu");
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}

document.getElementById('file-input').addEventListener('change', function() {
    var fileName = this.files[0].name;
    var label = document.querySelector('.file-label');
    label.textContent = 'Файл выбран: ' + fileName;
});


