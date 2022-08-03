<template>
<Page404 v-if='is404'/>
<section v-else-if="book"><div class="card mb-3">
  <img :src="book.image"  :alt="book.title">
  <div class="card-body">
    <h2 class="card-title text-uppercase">{{book.title}}</h2>
    <div>{{book.author}}</div>
    <p class="card-text">{{book.description}}</p>
    </div>

</div>

</section>

</template>

<script>
import Page404 from './Page404.vue'


export default {
    name: 'PageShow',
    components:{
        Page404
    },
    props:{
        book: String,
    },
data(){
    return {
        is404: false,
        book: null,
    }
},
created(){
    axios.get('/api/book/' + this.book)
    .then(risposta =>
    {
        if(risposta.data.success){
            this.book = risposta.data.result
        } else{
            this.is404 = true;
        }
});
}

}
</script>

<style lang="scss" >
section{
    height: 100%;

    .card{
background-color: #C4FFF9 ;
border: none;
        img{
            margin: 30px auto;
            width: 70%;
            border-radius: 20px;
        }
    }


}



</style>
