<template>
    <main>
        <section class="container">
            <h1 class="text-center">ChildrenBook</h1>
            <div class="row g-3 mt-4">
                <CardPost  v-for="book in books" :key="book.id" :book='book' />
            </div>
            <div>
                <nav id="pagination" aria-label="...">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
    </main>
</template>

<script>
import CardPost from '../components/CardPost.vue'

export default {
    name: 'PageBlog',
    components: {
        CardPost,
    },
    data() {
        return {
            // baseUrl: window.location.origin,
            books: []
        }
    },
    created() {
        //facciamo la richiesta all'API
        axios.get('/api/book')
            .then(risposta => {
                this.books = risposta.data.response.data;
                console.log(risposta);
            })
            .catch(error => console.log('errore API'));
    }
}
</script>

<style lang="scss" >
@import 'bootstrap/scss/bootstrap';

main {
    background-color: #C4FFF9;
    width: 100%;
    min-height: 100vh;

    .container {
        .text-center {
            color: #3DCCC7;
            padding-top: 30px;
            font-weight: bolder;
        }

        .card {
            padding: 20px;

            .btn {
                background-color: #3DCCC7;
                border: none;
                width: 50%;
                align-self: center;
            }
        }

        #pagination {
            margin: 0 auto;

            .active{
                --bs-pagination-active-bg: #3DCCC7;
                --bs-pagination-active-border-color: #3DCCC7;
            }
        }
    }

}
</style>
