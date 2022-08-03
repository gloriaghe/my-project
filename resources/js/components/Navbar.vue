<template>
    <div id="nav">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">ChildrenBooks</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li v-for="(navItem, index) in navItems" :key="index"  class="nav-item">
                            <!-- per passare la rotta usiamo questo(le classi le decidiamo noi normalmente) -->
                            <router-link :to="{ name: navItem.routeName }" class="nav-link text-uppercase">{{ navItem.label }}</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>

export default {
    name: 'NavBar',
    data(){
        return {
            navItems: [
                {
                    label: 'Home',
                    routeName: 'home'
                },
                {
                    label: 'Book',
                    routeName: 'book'
                 },
                // {
                //     label: 'About',
                //     routeName: 'about'
                // },
                // {
                //     label: 'Contacts',
                //     routeName: 'contacts'
                // },
            ]
        }
    }


}
</script>

<style lang="scss" scoped>

#nav{
    nav{

        height: 60px;
        background-color: #07BEB8;

        a{
            color: #006c69;
            font-weight: bolder;
        }
    }
}


</style>
