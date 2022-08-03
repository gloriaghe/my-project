<template>
    <div class="col-sm-6 col-md-4 p-4">
        <div class="card h-100">
            <img :src="book.image" class="card-img-top" :alt="book.title">
            <div class="card-body d-flex flex-column  pt-4">

                <h5 class="card-title text-uppercase">{{ book.title }}</h5>
                <p class="card-text mb-auto">{{ book.description }}</p>
                <router-link :to="{name:'show', params: {book: book.id}}" class="btn btn-primary  mt-4">
                <strong>VEDI LIBRO</strong>
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: 'CardPost',
props:{
    book: Object,
}

}
</script>

<style lang="scss" >
@import 'bootstrap/scss/bootstrap';


</style>
