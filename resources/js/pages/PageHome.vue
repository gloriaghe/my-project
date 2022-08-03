<template>
<section>
        <div class="row g-3 mt-4">

             <div v-for="book in books" :key="book.id" class="col-sm-6 col-md-4">
                <router-link :to="{name: 'show', params: {book: book.id} }">
                    <img :src="book.image" :alt="book.title" class="img-fluid">
                </router-link>
            </div>
         </div>
</section>
</template>

<script>

export default {
    name: 'PageHome',
    data(){
        return{
            books: [],
        }
    },
    created(){
        axios.get('/api/book/random')
        .then(res =>{
            if(res.data.success){
                this.books = res.data.result
            }
    });
    }

}
</script>

<style lang="scss" scoped>




</style>
