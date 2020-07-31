<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
                flex-direction: column;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .preview{
                width:150px;
                height:150px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            #description{
                margin-bottom: 20px;
            }

            .mselect{
                display: flex;
                flex-direction: row;
                align-items: baseline;
            }
            #options{
                display: none;
            }

            .mselect label{
                margin-bottom:5px;
                margin-right: 10px;
            }
            .mselect label input[type=checkbox]{
                display: none;
            }
            .check {
                padding: 2px 6px;
                border-radius: 10px;
                background: #fbfaf9;
            }
            #add__tag{
                display: block;
                color: #b2a9e0;
                font-weight: 600;
                text-decoration: underline;
                cursor: pointer;
            }
            #wrapper__tag{
                display: none;
            }
            #save__tag{
                float: right;
            }
            #close__tag{
                float: right;
            }
            .img__post{
                width:200px;
                height:235px;
                display: block;
                margin: auto;
            }

        </style>

    </head>
    <nav>
        <div class="links">
            <a href="{{ url('add') }}">Добавить</a>
            <a href="{{ url('list') }}">Просмотреть</a>
            <a href="https://github.com/UkDmS/laravel" target="_blank">GitHub</a>
        </div>
    </nav>
    <body>
        <div class="container">
        <div class="flex-center">
            <div class="row">
                <div class="col-md-6 col-lg-6 title m-b-md">
                    @yield('title')
                </div>
            </div>
            <div class="row">
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
        </div>
        <script>
            let newTag = document.querySelector("#new__tag");
            let addTag = document.querySelector("#add__tag");
            let wrapperTag = document.querySelector("#wrapper__tag");
            let closeTag = document.querySelector("#close__tag");
            let saveTag = document.querySelector("#save__tag");
            choiceTag();


            function choiceTag(){
                let colors = ['red',
                            'green',
                            'blue',
                            'pink',
                            'yellow',
                            "Salmon",
                            "DarkSalmon",
                            "LightSalmon",
                            "Crimson",
                            "Red",
                            "FireBrick",
                            "DarkRed",
                            "Pink",
                            "LightPink",
                            "HotPink",
                            "DeepPink",
                            "MediumVioletRed",
                            "PaleVioletRed",
                            "LightSalmon",
                            "Coral",
                            "Tomato",
                            "OrangeRed",
                            "DarkOrange",
                            "Orange"];
                let randomColorIndex;
                let mLabel = document.querySelectorAll(".mselect label");
                for(let i=0; i<mLabel.length; i++){
                    let child = mLabel[i].querySelector('input');
                    console.log(child)
                    child.addEventListener("click", function(){
                        let option = document.querySelector("#options option[data-name='"+child.value+"']");

                        let parent = child.parentNode;
                        parent.classList.toggle("check");
                        if(parent.classList.contains("check")) {
                            option.setAttribute('selected', 'selected');
                            randomColorIndex = getRandom(0,colors.length);
                            parent.style.border = '2px solid '+colors[randomColorIndex];
                        }
                        else {
                           option.removeAttribute("selected");
                           parent.removeAttribute("style");
                        }
                    })
                }
            }
            function getRandom(min,max){
                return Math.floor(Math.random() * (max-min) + min)
            }

            addTag.addEventListener("click", function(){
                wrapperTag.style.display = "block";
            });

            closeTag.addEventListener("click", function(){
                newTag.value = "";
                wrapperTag.removeAttribute("style");
            });

            saveTag.addEventListener("click", function(){
                var xhr = new XMLHttpRequest();
                var input = encodeURIComponent(newTag.value) ;
                xhr.open('POST',"{{config('app.public')}}saveTag");
                xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
                xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector("input[name=_token]").value);
                xhr.onreadystatechange = () => {
                    if(xhr.readyState === 4 && xhr.status === 200){
                        document.querySelector('#options').insertAdjacentHTML("beforeEnd", "<option value='"+xhr.responseText+"' data-name='"+newTag.value+"'>"+newTag.value+"</option>");
                        document.querySelector('.mselect').insertAdjacentHTML("beforeEnd", "<label><input type='checkbox' value='"+newTag.value+"'>"+newTag.value+"</label>");
                        newTag.value = "";
                        wrapperTag.removeAttribute("style");
                        choiceTag();
                        console.log(xhr.responseText);
                        console.log("sdfs");
                    }
                }
                xhr.send('tag=' + input)
                console.log(newTag.value)

            });

        </script>
    </body>
</html>
