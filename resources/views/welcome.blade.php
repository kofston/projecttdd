<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <script src="resources/js/jquery.js"></script>
    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
    </style>
    <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <style>
        body {
            font-family: Nunito, sans-serif;
        }
        .container{
            max-width: 1600px;
            width: 100%;
            background: rgba(255,255,255,0.7);
        }
        body {
            margin:0;
        }
        #page {
            margin:0;
            overflow:auto;
        }
        #page_container {
            margin:0 20px;
        }
    </style>
</head>
<body class="antialiased" style="margin: 0;">
<div id="page" style="padding:25px;background-image: url(https://wallpaperaccess.com/full/2311974.jpg);background-size: cover;width: 100%;height: 100vh;">
    <div class="container mx-auto p-6 text-center" style="margin-top: 100px;">
        <h1>Kantor online - NBP</h1>
        <h3>Sprawdź aktualne kursy walut...</h3>
        <div class="form-control">
            <input id="numbr" type="number" step="0.01" min="0" placeholder="Wpisz wartość kwoty w złotówkach">
            <button class="btn btn-info" id="count">Przelicz</button>
            <br>
            <div id="response">
                <h5>Kliknij przelicz aby przeliczyć kurs</h5>
            </div>
            <div>
                <table style="width: 100%;"><tr><td id="word_usd"></td><td id="word_eur"></td><td id="word_gbp"></td></tr></table>
            </div>
            <div id="response_history">
                <h5>Historia USD:</h5>
                <div id="chart_usd" style="height: 200px;width: 100%;"></div>
                <h5>Historia EUR:</h5>
                <div id="chart_eur" style="height: 200px;width: 100%;"></div>
                <h5>Historia GBP:</h5>
                <div id="chart_funt" style="height: 200px;width: 100%;"></div>
            </div>
        </div>
    </div>
</div>
<script>
function drawChart(CHAR_usd,CHAR_eur,CHAR_funt)
{
    new Morris.Line({
        element: 'chart_usd',
        data: CHAR_usd,
        xkey: 'year',
        ykeys: ['value'],
        labels: ['Value']
    });
    new Morris.Line({
        element: 'chart_eur',
        data: CHAR_eur,
        xkey: 'year',
        ykeys: ['value'],
        labels: ['Value']
    });
    new Morris.Line({
        element: 'chart_funt',
        data: CHAR_funt,
        xkey: 'year',
        ykeys: ['value'],
        labels: ['Value']
    });
}
    $("#count").unbind().click(function() {
        let val = $("#numbr").val();
        if(val!='')
        {
            $.ajax({
                beforeSend:function (){
                    $("#response").html("<h1>WCZYTYWANIE...</h1>");
                },
                url: "/get_api/"+val,
                success:function (result){
                    if(result!='0')
                    {
                        if(result[0].effectiveDate.length>0)
                        {
                            let day = result[0].effectiveDate;
                            console.log(result[0]);
                            let usd = result[0].rates[1].mid,eur = result[0].rates[7].mid,funt = result[0].rates[10].mid;
                            let finish_usd = (parseFloat(val)/parseFloat(usd)).toFixed(2),finish_euro = (parseFloat(val)/parseFloat(eur)).toFixed(2),finish_funt = (parseFloat(val)/parseFloat(funt)).toFixed(2);
                            let word_usd = '',word_eur = '',word_funt='';
                            $("#response").html('<table width="100%"style="border:1pxsolidblack;"><tr><th style="border:1pxsolidblack;"class="text-center"><img width="100px"src="https://cdn-icons-png.flaticon.com/512/555/555526.png"/><h3>Dolar</h3></th><th style="border:1pxsolidblack;"class="text-center"><img width="100px"src="https://www.flagi-24.pl/images/panstwa/unia_europejska.png"/><h3>Euro</h3></th><th style="border:1pxsolidblack;"class="text-center"><img width="100px"src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f2/Flag_of_Great_Britain_%281707%E2%80%931800%29.svg/1024px-Flag_of_Great_Britain_%281707%E2%80%931800%29.svg.png"/><h3>Funt</h3></th></tr><tr><td style="border:1pxsolidblack;"colspan="3">Dane z dnia: '+day+'</td></tr><tr><td style="border:1pxsolidblack;"colspan="3">Średnikurs:</td></tr><tr><td style="border:1pxsolidblack;">'+usd+'</td><td style="border:1pxsolidblack;">'+eur+'</td><td style="border:1pxsolidblack;">'+funt+'</td></tr><tr><td style="border:1pxsolidblack;font-size:20px;"colspan="3">Wyliczenia:</td></tr><tr><td style="border:1pxsolidblack;font-size:22px;">'+finish_usd+' zł</td><td style="border:1pxsolidblack;font-size:22px;">'+finish_euro+' zł</td><td style="border:1pxsolidblack;font-size:22px;">'+finish_funt+' zł</td></tr></table>');

                            for(var i=0;i<3;i++)
                            {
                                switch (i)
                                {
                                    case 0:
                                        $.ajax({
                                            url: "/toword/"+finish_usd,
                                            success:function (result){
                                                $("#word_usd").html("<strong>"+result+"</strong>");
                                            }
                                        });
                                        break;
                                    case 1:
                                        $.ajax({
                                            url: "/toword/"+finish_euro,
                                            success:function (result){
                                                $("#word_eur").html("<strong>"+result+"</strong>");
                                            }
                                        });
                                        break;
                                    case 2:
                                        $.ajax({
                                            url: "/toword/"+finish_funt,
                                            success:function (result){
                                                $("#word_gbp").html("<strong>"+result+"</strong>");
                                            }
                                        });
                                        break;
                                }
                            }
                        }
                        else
                            alert("Wystąpił problem z API");
                    }
                    else
                        alert("Wpisano niepoprawną kwotę / wystąpił problem z API");
                }
            });

            $.ajax({
                url: "/get_api_history/",
                success:function (result){
                    if(result!='0')
                    {
                        if(result[0].effectiveDate.length>0)
                        {
                            var CHAR_usd = [],CHAR_eur = [],CHAR_funt=[];

                            $(result).each(function(index) {
                                let day = result[index].effectiveDate;
                                let usd = result[index].rates[1].mid,eur = result[index].rates[7].mid,funt = result[index].rates[10].mid;
                                let obj_usd = {year:day,value:usd},obj_eur = {year:day,value:eur},obj_funt = {year:day,value:funt};
                                CHAR_usd.push(obj_usd);
                                CHAR_eur.push(obj_eur);
                                CHAR_funt.push(obj_funt);
                            });
                            setTimeout(drawChart(CHAR_usd,CHAR_eur,CHAR_funt), 1000);
                        }
                        else
                            alert("Wystąpił problem z API");
                    }
                    else
                        alert("Wpisano niepoprawną kwotę / wystąpił problem z API");
                }
            });
        }
        else
        {
            alert("Nie podano wartości lub podana wartość nie jest liczbą!");
        }
    });
</script>
</body>
</html>'
