// function validation()
// {
//     $.fn.classes = function (callback)
//     {
//         var classes = [];
//         $.each(this, function (i, v) {
//             var splitClassName = v.className.split(/\s+/);
//             for (var j = 0; j < splitClassName.length; j++) {
//                 var className = splitClassName[j];
//                 if (-1 === classes.indexOf(className)) {
//                     classes.push(className);
//                 }
//             }
//         });
//         if ('function' === typeof callback) {
//             for (var i in classes) {
//                 callback(classes[i]);
//             }
//         }
//         return classes;
//     };
//
//     $('body').on("change keyup input click", 'input', function()
//     {
//         const pattern =
//             {
//                 'cyrillic' : 'a-z',
//                 'latin' : 'а-я',
//                 'number' : '1-9'
//             };
//
//         let input = $(this).classes();
//
//         let inputClasses = "";
//
//         for(var i = 0; i < input.length; i++)
//         {
//             $.each(pattern, function (key, value)
//             {
//                 if (key === input[i])
//                 {
//                     inputClasses += value;
//                 }
//             });
//         }
//
//         const regex = new RegExp(`[^${inputClasses}]`, 'ig');
//
//         if (this.value.match(regex))
//         {
//             this.value = this.value.replace(regex, '');
//         }
//     });
// };
//
// export {validation};