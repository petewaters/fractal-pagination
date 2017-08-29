<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Posts</div>

                    <div class="panel-body">
                        <post v-for="post in posts" v-bind:data="post" v-bind:key="post.text"></post>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                posts: [],
                meta: null
            }
        },
        methods: {
            getPosts(page) {
                axios.get('/posts?page' + page).then((response) => {
                    this.posts = response.data.data
                    this.meta = response.data.meta
                })
            }
        },
        mounted() {
            this.getPosts(1)
        }
    }
</script>
