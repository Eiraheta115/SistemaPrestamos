var pmt_msg = "Inserte el plazo de amortización en años o meses";
var pmt_msg2 = "Asegurese de marcar años o meses";
var int_msg = "Inserte el tipo de interés";
var int_msg2 = "Ejemplo: 6.5% se inserta como 6.5 o 0.065";
var prin_msg = "Inserte el importe a financiar";
var prin_msg2 = "";
var m_pmt_msg = "Esta es la cuota de pago mensual";
var m_pmt_msg2 = "";
var tot_int_msg = "Este es el total de intereses a pagar";
var tot_int_msg2 = "";

function show_hlp_msg(msg_1, msg_2) {
    document.frmLoan.msg1.value = msg_1;
    document.frmLoan.msg2.value = msg_2;
}

function clear_hlp_msg() {
    document.frmLoan.msg1.value = '';
    document.frmLoan.msg2.value = '';
}

function valid_Num(input, min, max, field) {
    var msg = " La casilla de " + field + " contiene datos no validos: " + input.value;
    var str = input.value;
    for (var i = 0; i < str.length; i++) {
        var ch = str.substring(i, i + 1)
        if ((ch < "0" || ch > "9") && ch != '.' && ch != '*' && ch != '/' && ch != '+' && ch != '-') {
            alert(msg);
            input.focus();
            return false
        }
    }
    var num = 0 + str;
    if (num < min || max < num) {
        alert(field + " no es un rango valido\nRango valido entre: " + min + " - " + max)
        input.focus()
        return false;
    }

    input.value = eval(input.value);
    return true;
}

function eval_field(input) {
    if (input.length == 0 || input.value == "") {
        return;
    }

    var field_value = input.value;
    for (var i = 0; i < field_value.length; i++) {
        var ch = field_value.substring(i, i + 1)
        if ((ch < "0" || ch > "9") && ch != '.' && ch != '*' && ch != '/' && ch != '+' && ch != '-') {
            return;
        }
    }
    input.value = eval(input.value);
}

function computeForm(form) {

    if ((form.payments.value == null || form.payments.value.length == 0) ||
        (form.interest.value == null || form.interest.value.length == 0) ||
        (form.principal.value == null || form.principal.value.length == 0)) {
        return;
    }

    if (!valid_Num(form.principal, 100, 10000000, "Importe") ||
        !valid_Num(form.interest, .01, 99, "Interés") ||
        !valid_Num(form.payments, 1, form.pmtper[0].checked ? 480 : 40,
            form.pmtper[0].checked ? "Número de Meses" : "Número de Años")) {
        form.m_pymt.value = "error";
        form.tot_int.value = "error";
        return;
    }

    P = eval(form.principal.value);

    if (form.pmtper[0].checked) {
        T = eval(form.payments.value);
    } else {
        T = eval(form.payments.value) * 12;
    }

    I = eval(form.interest.value);

    if (I >= 1) {
        I /= 100;
    }

    I /= 12;

    power = Math.pow(1 + I, T);
    form.m_pymt.value = round_it((P * I * power) / (power - 1));
    form.tot_int.value = round_it(eval(form.m_pymt.value * T) - eval(form.principal.value));
}

function round_it(amount) {
    cents = amount * 100;
    cents = Math.round(cents);
    strCents = "" + cents;
    len = strCents.length;
    return strCents.substring(0, len - 2) + "." + strCents.substring(len - 2, len);
}
