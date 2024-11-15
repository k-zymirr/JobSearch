window.onload = function() {
    const skillRange = document.getElementById('noteSkill');
    const skillNumber = document.getElementById('noteSkillNumber');

    const locationRange = document.getElementById('noteLocation');
    const locationNumber = document.getElementById('noteLocationNumber');

    const modifBase = document.getElementsByClassName('modifBase');


    if (localStorage.getItem('theme') == 'dark'){
        document.getElementsByTagName('body')[0].classList.add('darkTheme');
    }

    skillRange.addEventListener('input', function() {
        skillNumber.value = skillRange.value;
    });
    skillNumber.addEventListener('input', function() {
        let value = skillNumber.value;

        if (value < 0){
            value = 0;
            skillNumber.value = 0;
        }

        if (value > 10){
            value = 10;
            skillNumber.value = 10;
        }

        if (value == ""){
            skillRange.value = 0;
        }else {
            skillRange.value = value;
        }
    });

    locationRange.addEventListener('input', function() {
        locationNumber.value = locationRange.value;
    });
    locationNumber.addEventListener('input', function() {
        let value = locationNumber.value;

        if (value < 0){
            value = 0;
            locationNumber.value = 0;
        }

        if (value > 10){
            value = 10;
            locationNumber.value = 10;
        }

        if (value == ""){
            locationRange.value = 0;
        }else {
            locationRange.value = value;
        }
    });

    for (let i = 0; i < modifBase.length; i++) {
        console.log(modifBase[i]);
        modifBase[i].addEventListener('change', function() {
            document.getElementById('changed').click();
        });
    };

    document.querySelectorAll("div > input[type='text']").forEach(input => {
        input.parentNode.classList.add("inputGroup");
    });
}


function changeTheme() {
    if (document.getElementsByClassName('darkTheme').length == 0){
        document.getElementsByTagName('body')[0].classList.add('darkTheme');
        localStorage.setItem('theme', 'dark');
    }else {
        document.getElementsByTagName('body')[0].classList.remove('darkTheme');
        localStorage.setItem('theme', 'light');
    }
}

function toggleCheckbox(id) {
    let checkbox = document.getElementById('delete-' + id);
    checkbox.checked = !checkbox.checked;
    document.getElementById('changed').click();
}
