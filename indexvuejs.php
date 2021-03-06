

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/app.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>

    <title>Document</title>
</head>

<body>
    <div id="app">


        <nav>
            <h1>MyMusicApp</h1>
            <select @change="onSelectChange" v-model="genreToFilter">
                <option value="">Tutti i generi</option>
                <option :value="genre" v-for="genre in genrLista">{{genre}}</option>
            </select>

        </nav>



        <div class="albums-container">
            <div class="albums" v-for="element of filteredData">
                <img :src="element.poster" alt="">
                <p><strong>{{element.title}}</strong></p>
                <p>{{element.author}}</p>
                <span> - {{element.genre}} - </span>
                <span>{{element.year}} - </span>
            </div>
        </div>

    </div>






    <script src="script\app.js"></script>
</body>

</html>