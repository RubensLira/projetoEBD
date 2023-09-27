const check1 = document.querySelector('#checkCol1')
const check2 = document.querySelector('#checkCol2')
const check3 = document.querySelector('#checkCol3')
const check4 = document.querySelector('#checkCol4')

// Evento da coluna 1
check1.addEventListener('change', function (event) {
    let col1Elements = document.querySelectorAll('.col1')
    col1Elements.forEach(function(element) {
        if (check1.checked) {
            element.style.display = 'none'
        } else {
            element.style.display = ''
        }
    })
})

// Evento da coluna 2
check2.addEventListener('change', function (event) {
    let col1Elements = document.querySelectorAll('.col2')
    col1Elements.forEach(function(element) {
        if (check2.checked) {
            element.style.display = 'none'
        } else {
            element.style.display = ''
        }
    })
})

// Evento da coluna 3
check3.addEventListener('change', function (event) {
    let col1Elements = document.querySelectorAll('.col3')
    col1Elements.forEach(function(element) {
        if (check3.checked) {
            element.style.display = 'none'
        } else {
            element.style.display = ''
        }
    })
})

// Evento da coluna 4
check4.addEventListener('change', function (event) {
    let col1Elements = document.querySelectorAll('.col4')
    col1Elements.forEach(function(element) {
    if (check4.checked) {
        element.style.display = 'none'
    } else {
        element.style.display = ''
    }
    })
})

