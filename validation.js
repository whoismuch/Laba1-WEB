var form = document.querySelector('.validateForm')
var validateBtn = form.querySelector('.butt')
var chooseXRadios = document.getElementsByName('chooseX')
var enterY = form.querySelector('.enterYInner')
var selectR = form.querySelector('.selectRInner')

var styleY = enterY.style
var styleR = selectR.style
var chooseXTitle = form.querySelector('.chooseXTitle')
var styleX = chooseXTitle.style
var flagY = true
var flagX = true
var flagR = true


//Обрабатываем ввод координаты Y пользователем, блокируем ввод неправильных значений 

enterY.addEventListener('input', function() {
	enterY.style = styleY
	
	if (isNaN(enterY.value) && enterY.value && enterY.value!='-' || !isNaN(enterY.value) && (Number(enterY.value) < -3 || Number(enterY.value) > 5 )) {
		setTimeout(function() {
		enterY.value = ""
		enterY.style.border = '3px solid red'
		enterY.blur()
		flagY = false
		}, 200)
	}

	else {
		flagY = true
	}
})

//При выборе одного варианта из селектора, меняем стиль на стандартный (без красной рамки)
selectR.addEventListener('change', function() {
			selectR.style = styleR
			flagR = true

})

//Обработчик события нажатия на кнопку 

form.addEventListener('submit', function(event) {
	event.preventDefault()


	//Если в поле, которое соответствует значению Y, 
	//пусто или там находится знак "-" -> ошибка
	//(Остальные опасные ситуации блокируются ранее)

	if (!enterY.value || enterY.value == '-') {
		enterY.style.border = '3px solid red'
		flagY = false
	}

	else  {
		enterY.style = styleY
		flagY = true
	}


	//Если пользователь не выбрал в селекторе никакое значение R 
	//И оно осталось стандартным -> ошибка 
	if (selectR.value=="Выберите R") {
		selectR.style.border = '3px solid red'
		flagR = false

	}

	else {
		selectR.style = styleR
		flagR = true
	}


	//Проходим по всем радиокнопкам и проверям. выбрана ли хоть какая-нибудь
	for (var i=0, length = chooseXRadios.length; i<length; i++) {
		
		chooseXRadios[i].addEventListener('change', function() {
			chooseXTitle.style = styleX
			flagX = true
		})

		if (chooseXRadios[i].checked) {
			var id = (chooseXRadios[i].id)
			break
		}
	}


	//Если переменна id == null значит ни одна кнопка не выбрана -> ошибка
	if (!id) {
		chooseXTitle.style.color = 'red'
		chooseXTitle.style.fontWeight = 'bold'
		flagX = false
	}


	if (flagX == true && flagY == true && flagR == true) {
		form.submit()
	}


})


