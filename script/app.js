new Vue({
    el: "#app",
    data: {
        filteredData:[],
        listAlbums: [],
        genrLista: [],
        genreToFilter: ""


    }, mounted() {
        axios.get("http://localhost/php_intro/php-ajax-dischi/ajax/ajaxdischi.php")
            .then((response) => {
                this.sort(response.data)
                this.listAlbums = response.data;
                this.filteredData=response.data;
                this.generategenreList()
            })
          



    },
    methods: {
        sort(listcopy) {
            listcopy.sort((albumA, albumB) => {
                const dateA = moment(albumA.year, "YYYY");
                const dateB = moment(albumB.year, "YYYY");

                if (dateA.isAfter(dateB)) {
                    return 1;
                } else if (dateA.isBefore(dateB)) {
                    return -1;
                }
                return 0;
            })
            return listcopy
        },
        generategenreList() {
            this.listAlbums.forEach((element) => {
                if (!this.genrLista.includes(element.genre)) {
                    this.genrLista.push(element.genre)
                }
            })
        },
        onSelectChange(){
            if(this.genreToFilter === ""){
                this.filteredData = this.listAlbums
                return

            }

            const newFilteredData = this.listAlbums.filter((element)=>{
                return element.genre === this.genreToFilter
            })

            this.filteredData = newFilteredData
        }
    },
})