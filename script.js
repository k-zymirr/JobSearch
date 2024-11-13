window.onload = function() {
    const squillRange = document.getElementById('noteSquill');
    const squillNumber = document.getElementById('noteSquillNumber');

    const locationRange = document.getElementById('noteLocation');
    const locationNumber = document.getElementById('noteLocationNumber');

    const modifBase = document.getElementsByClassName('modifBase');


    squillRange.addEventListener('input', function() {
        squillNumber.value = squillRange.value;
    });
    squillNumber.addEventListener('input', function() {
        let value = squillNumber.value;

        if (value < 0){
            value = 0;
            squillNumber.value = 0;
        }

        if (value > 10){
            value = 10;
            squillNumber.value = 10;
        }

        if (value == ""){
            squillRange.value = 0;
        }else {
            squillRange.value = value;
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
    }else {
        document.getElementsByTagName('body')[0].classList.remove('darkTheme');
    }
}