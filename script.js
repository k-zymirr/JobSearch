window.onload = function() {
    if (localStorage.getItem('lang') === null) {
        localStorage.setItem('lang', 'fr');
    }

    const skillRange = document.querySelectorAll('#noteSkill');
    const skillNumber = document.querySelectorAll('#noteSkillNumber');

    const locationRange = document.querySelectorAll('#noteLocation');
    const locationNumber = document.querySelectorAll('#noteLocationNumber');

    const modifBase = document.getElementsByClassName('modifBase');

    if (localStorage.getItem('theme') == 'dark'){
        document.getElementsByTagName('body')[0].classList.add('darkTheme');
    }

    for (let i = 0; i < skillRange.length; i++) {
        skillRange[i].addEventListener('input', function() {
            skillNumber[i].value = skillRange[i].value;
        });
    }

    for (let i = 0; i < skillNumber.length; i++) {
        skillNumber[i].addEventListener('input', function() {
            let value = skillNumber[i].value;

            if (value < 0){
                value = 0;
                skillNumber[i].value = 0;
            }

            if (value > 10){
                value = 10;
                skillNumber[i].value = 10;
            }

            if (value == ""){
                skillRange[i].value = 0;
            } else {
                skillRange[i].value = value;
            }
        });
    }

    for (let i = 0; i < locationRange.length; i++) {
        locationRange[i].addEventListener('input', function() {
            locationNumber[i].value = locationRange[i].value;
        });
    }

    for (let i = 0; i < locationNumber.length; i++) {
        locationNumber[i].addEventListener('input', function() {
            let value = locationNumber[i].value;

            if (value < 0){
                value = 0;
                locationNumber[i].value = 0;
            }

            if (value > 10){
                value = 10;
                locationNumber[i].value = 10;
            }

            if (value == ""){
                locationRange[i].value = 0;
            } else {
                locationRange[i].value = value;
            }
        });
    }

    for (let i = 0; i < modifBase.length; i++) {
        modifBase[i].addEventListener('change', function() {
            if (localStorage.getItem('lang') === 'fr') {
                document.getElementById('changed-fr').click();
            } else {
                document.getElementById('changed-en').click();
            }
        });
    }

    document.querySelectorAll("div > input[type='text']").forEach(input => {
        input.parentNode.classList.add("inputGroup");
    });

    updateLanguage();
}

function changeTheme() {
    if (document.getElementsByClassName('darkTheme').length == 0){
        document.getElementsByTagName('body')[0].classList.add('darkTheme');
        localStorage.setItem('theme', 'dark');
    } else {
        document.getElementsByTagName('body')[0].classList.remove('darkTheme');
        localStorage.setItem('theme', 'light');
    }
}

function changeLanguage() {
    var currentLang = document.documentElement.lang;

    if (currentLang === 'fr') {
        document.documentElement.lang = 'en';
    } else if (currentLang === 'en') {
        document.documentElement.lang = 'fr';
    }

    localStorage.setItem('lang', document.documentElement.lang);
    updateLanguage();
    location.reload();
}

function updateLanguage() {
    if (localStorage.getItem('lang') === 'fr') {
        document.getElementsByClassName("fr")[0].style.display = "block";
        document.getElementsByClassName("en")[0].style.display = "none";
        document.documentElement.lang = 'fr';
    } else if (localStorage.getItem('lang') === 'en') {
        document.getElementsByClassName("fr")[0].style.display = "none";
        document.getElementsByClassName("en")[0].style.display = "block";
        document.documentElement.lang = 'en';
    }
}

function toggleCheckbox(id) {
    let checkbox;
    if (localStorage.getItem('lang') === 'fr') {
        checkbox = document.querySelectorAll('#delete-' + id)[0];
    }else {
        checkbox = document.querySelectorAll('#delete-' + id)[1];
    }
    checkbox.checked = !checkbox.checked;
    if (localStorage.getItem('lang') === 'fr') {
        document.getElementById('changed-fr').click();
    } else {
        document.getElementById('changed-en').click();
    }
}
