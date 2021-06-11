<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>Калькулятор</title>
</head>
<body>
<div class="wrapper">
    <header class="header">
        <div class="container">
            <div class="header__top">
                <div class="header__info">
                    <a href="#" class="header__logo"><img class="header__logo-img" src="img/logo.png" alt="логотип банка"></a>
                    <div class="header__contacts">
                        <a href="tel:+78001005005" class="header__tel-number-first">8-800-100-5005</a>
                        <a href="tel:+73452522000" class="header__tel-number-second">+7(3452)522-000</a>
                    </div>
                </div>
            </div>
            <div class="header__center">
                <nav class="header__menu">
                    <ul class="header__menu-list">
                        <li class="header__menu-item"><a href="#" class="header__menu-link">Кредитные карты</a></li>
                        <li class="header__menu-item"><a href="#" class="header__menu-link active">Вклады</a></li>
                        <li class="header__menu-item"><a href="#" class="header__menu-link">Дебетовая карта</a></li>
                        <li class="header__menu-item"><a href="#" class="header__menu-link">Страхование</a></li>
                        <li class="header__menu-item"><a href="#" class="header__menu-link">Друзья</a></li>
                        <li class="header__menu-item"><a href="#" class="header__menu-link">Интернет-банк</a></li>
                    </ul>
                </nav>
            </div>
            <div class="header__bottom">
                <nav class="header__breadcrumb">
                    <ul class="header__breadcrumb-list">
                        <li class="header__breadcrumb-item"><a class="header__breadcrumb-link" href="">Главная</a></li>
                        <li class="header__breadcrumb-item"><a class="header__breadcrumb-link" href="">Вклады</a></li>
                        <li class="header__breadcrumb-item-active">Калькулятор</li>
                    </ul>
                </nav>
            </div>
        </div>

    </header>
    <main class="main">
        <div class="container">
            <div class="form">
                <div class="form-title">Калькулятор</div>
                <div class="row">
                    <p>Дата оформления вклада</p>
                    <input type="text" id="datepicker" placeholder="дд.мм.ггг">
                </div>
                <div class="row include-range">
                    <p>Сумма вклада</p>
                    <input type="text" name="currency-field" id="deposit-amount" pattern="^\d{1,3}(,\d{3})*(\.\d+)? руб." value="" data-type="currency" placeholder="1,000.00 руб.">
                    <div class="range-row">
                        <div class="range" id="deposit-amount-range"></div>
                        <h6 class="left-side">1 тыс. руб</h6>
                        <h6 class="right-side">3 000 000</h6>
                    </div>
                </div>
                <div class="row">
                    <p>Срок вклада</p>
                    <select class="select-css" id="deposit-term">
                        <option value="1">1 год</option>
                        <option value="2">2 года</option>
                        <option value="3">3 года</option>
                        <option value="4">4 года</option>
                        <option value="5">5 лет</option>
                    </select>
                </div>
                <div class="row">
                    <p>Пополнение вклада</p>
                    <div class="light">
                        <label>
                            <input type="radio" name="light" value="0">
                            <span class="design"></span>
                            <span class="text">Нет</span>
                        </label>

                        <label>
                            <input type="radio" name="light" checked="checked" value="1">
                            <span class="design"></span>
                            <span class="text">Да</span>
                        </label>
                    </div>
                </div>
                <div class="row include-range">
                    <p>Сумма пополнения вклада</p>
                    <input type="text" id="replenishment-amount" name="currency-field" pattern="^\d{1,3}(,\d{3})*(\.\d+)? руб." data-type="currency" placeholder="1,000.00 руб.">
                    <div class="range-row">
                        <div class="range" id="replenishment-amount-range"></div>
                        <h6 class="left-side">1 тыс. руб</h6>
                        <h6 class="right-side">3 000 000</h6>
                    </div>
                </div>
                <div class="row">
                    <button id="calc_btn" class="button">Рассчитать</button>
                    <div class="result" id="result">
                    </div>

                </div>
            </div>
        </div>

    </main>
    <footer class="footer">
        <div class="container">
            <div class="footer__menu">
                <ul class="footer__list">
                    <li class="footer__item"><a href="#" class="footer__link">Кредитные карты</a></li>
                    <li class="footer__item"><a href="#" class="footer__link">Вклады</a></li>
                    <li class="footer__item"><a href="#" class="footer__link">Дебетовая карта</a></li>
                    <li class="footer__item"><a href="#" class="footer__link">Страхование</a></li>
                    <li class="footer__item"><a href="#" class="footer__link">Друзья</a></li>
                    <li class="footer__item"><a href="#" class="footer__link">Интернет-банк</a></li>
                </ul>
            </div>
        </div>
    </footer>
</div>
</body>
</html>

<script src="script.js"></script>
<script>

    $("#deposit-amount-range").slider({
        animate: "slow",
        min: 1000,
        max: 3000000,
        range: "min",
        value: 500000,
        slide : function(event, ui) {
            $("#deposit-amount").val("₽" + formatNumber(ui.value.toString()) + ".00");
        }
    });
    $("#replenishment-amount-range").slider({
        animate: "slow",
        min: 1000,
        max: 3000000,
        range: "min",
        value: 300000,
        slide : function(event, ui) {
            $("#replenishment-amount").val("₽" + formatNumber(ui.value.toString()) + ".00");
        }
    });

    $.datepicker.regional['ru'] = {
        closeText: 'Закрыть',
        prevText: 'Предыдущий',
        nextText: 'Следующий',
        currentText: 'Сегодня',
        monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
        monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
        dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
        dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
        dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
        weekHeader: 'Не',
        dateFormat: 'dd.mm.yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };

    $.datepicker.setDefaults($.datepicker.regional['ru']);

    $(function() {
        let date = new Date();
        date.setDate(date.getDate());
        -
            $("#datepicker").datepicker({
                minDate: date
            });
    });

    $("#calc_btn").click(function () {
        let dateObj = isDate($("#datepicker").val()) ? isDate($("#datepicker").val()) : "incorrect";
        let _date =  dateObj.days;
        let _daysy = days_of_a_year(dateObj.year);
        let _depositSumm = $("#deposit-amount").val();
        let _summ1 = _depositSumm.substring(1, _depositSumm.length - 3).replace(/,/g, '');
        let _depositTerm = $("#deposit-term").val();
        let _select = displayRadioValue();
        let _replenishmentDeposit = $("#replenishment-amount").val();
        let _summadd = _replenishmentDeposit.substring(1, _replenishmentDeposit.length - 3).replace(/,/g, '');

        if(!_summ1 | !_summadd | !_date) {
            $("#result").html('<span>Результат:</span> ошибка, проверьте введенные вами поля...');
            return;
        }

        $.ajax({
            url: "calc.php",
            method: "POST",
            data: {
                daysy: _daysy,
                date: _date,
                summ1: _summ1,
                depositTerm: _depositTerm,
                select: _select,
                summadd: _summadd
            },
            dataType: "json"

        }).done(function( msg ) {
            $("#result").html(msg['answer'])
        });
    });

</script>
