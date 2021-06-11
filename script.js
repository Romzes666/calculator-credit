
$("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() { 
      formatCurrency($(this), "blur");
    },
    change: function() {
      formatCurrency($(this));
    }
});

function formatNumber(n) {
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function formatCurrency(input, blur) {
    let input_val = input.val();
    if (input_val === "") { return; }
    let original_len = input_val.length;
    let caret_pos = input.prop("selectionStart");
    if (input_val.indexOf(".") >= 0) {
        let decimal_pos = input_val.indexOf(".");

        let left_side = input_val.substring(0, decimal_pos);
        let right_side = input_val.substring(decimal_pos);

        left_side = formatNumber(left_side);
        right_side = formatNumber(right_side);

        if (blur === "blur") {
            right_side += "00";
        }
        right_side = right_side.substring(0, 2);

        input_val = "₽" + left_side + "." + right_side;
    } else {
        input_val = formatNumber(input_val);
        input_val = "₽" + input_val;

        if (blur === "blur") {
            if(input_val.length < 6)
                input_val = "₽1,000";
            if(input_val.length > 10)
                input_val = "₽3,000,000";
            input_val += ".00";
        }
    }
    input.val(input_val);

    let updated_len = input_val.length;
    caret_pos = updated_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);
}

function displayRadioValue() {
  var ele = document.getElementsByName('light');
    
  for(i = 0; i < ele.length; i++) {
      if(ele[i].checked)
        return ele[i].value;
  }
}

function isDate(ExpiryDate) {
    let objDate, mSeconds, day, month, year;
    if (ExpiryDate.length !== 10) {
        return;
    }
    if (ExpiryDate.substring(2, 3) !== '.' || ExpiryDate.substring(5, 6) !== '.') {
        return;
    }
    day = ExpiryDate.substring(0, 2) - 0;
    month = ExpiryDate.substring(3, 5) - 1;
    let _year = ExpiryDate.substring(6, 10) - 0;
    if (_year < 1000 || _year > 3000) {
        return;
    }
    if (month < 0 || month > 12) {
        return;
    }
    mSeconds = (new Date(_year, month, day)).getTime();
    objDate = new Date();
    objDate.setTime(mSeconds);
    if (objDate.getFullYear() !== _year ||
        objDate.getMonth() !== month ||
        objDate.getDate() !== day) {
        return;
    }

    month = objDate.getMonth() + 1;
    year = objDate.getFullYear();
    let daysInMonth = new Date(year, month, 0).getDate();
    return {
        "days": daysInMonth,
        "year": _year };
}

function days_of_a_year(year) {
  return isLeapYear(year) ? 366 : 365;
}
function isLeapYear(year) {
     return year % 400 === 0 || (year % 100 !== 0 && year % 4 === 0);
}