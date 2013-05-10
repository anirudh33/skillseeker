
//
//  *************************** Creation Log ******************************* 
//  File Name 	- MainController.php 
//  Description 	- Main Controller 
//  Version - 1.0 
//  Created by	- Debanshu kar, Priya Khatnani
//  Created on - May 10, 2013 
//  **********************Update Log *************************************** 
//  Sr.NO. Version Updated by Updated on Description 
//  ------------------------------------------------------------------------- 
 
//  ************************************************************************
 

$(document).ready(function() {
$.tools.validator.fn("[type=time]", "Please supply a valid time", function(input, value) {
return /^\d\d:\d\d$/.test(value);
});
    $.tools.validator.fn("[data-equals]", "Value not equal with the $1 field", function(input) {
var name = input.attr("data-equals"),
field = this.getInputs().filter("[name=" + name + "]");
return input.val() == field.val() ? true : [name];
});
    $.tools.validator.fn("[minlength]", function(input, value) {
var min = input.attr("minlength");

return value.length >= min ? true : {
en: "Please provide at least " +min+ " character" + (min > 1 ? "s" : ""),
fi: "Kent&auml;n minimipituus on " +min+ " merkki&auml;"
};
});
    $.tools.validator.localizeFn("[type=time]", {
en: 'Please supply a valid time',
fi: 'Virheellinen aika'
});
    $("#myform").validator({
position: 'top left',
offset: [-12, 0],
message: '<div><em/></div>' 
});
});
