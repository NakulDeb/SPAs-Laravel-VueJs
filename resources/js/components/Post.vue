<template>
    <div class="container py-3">
        <div class="float-right pr-3">
            <form action="" method="get" @submit.prevent="getPost(search.query, '','search-box', 1)">
                <div class="float-left">
                    <input
                        id="search"
                        type="text"
                        class="form-control"
                        v-model="search.query"
                        placeholder="Search">
                </div>
                <div class="float-right pl-3">
                    <button type="submit" class="btn btn-primary">
                        Search
                    </button>
                </div>
            </form>
        </div>
        <br>
        <br>
        <div class="row m-auto">
            <div v-for="post in posts" class="col-sm-6 col-md-4 col-lg-3 py-3">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h6 class="text-center text-info">
                            <a class="text-decoration-none" href="javascript:void(0)" @click="getPost('', post.category_id, 'category-search', 2)">{{post.category.name.toUpperCase()}}</a>
                        </h6>
                    </div>
                    <img :src="post.photo" class="card-img-top" alt="...">
                    <div class="card-body bg-white">
                        <h6 class="card-subtitle text-justify text-muted font-weight-bold"  style="height: 130px">{{post.title}}</h6>
                        <div style="height:2px; background: #18a094" class="my-3 shadow"></div>
                        <p class="card-text text-justify">{{ post.post_description.description.substring(0,150)+".." }}</p>
                        <div class="text-center">
                            <a href="#" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-auto mr-auto">
                    <button class="page-link" aria-label="Previous" :disabled="!pagination.prev_page_url" @click="fetchPaginagion(pagination.prev_page_url)">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                        Previous
                    </button>
                </div>
                <div class="col-auto mr-auto">
                    <p class="text-center">[Total Post {{pagination.total_item}} : Show {{pagination.from_item}} to {{pagination.to_item}}] [Page {{pagination.current_page}} of {{pagination.last_page}}]</p>
                </div>

                <div class="col-auto">

                    <button class="page-link" aria-label="Next" :disabled="!pagination.next_page_url" @click="fetchPaginagion(pagination.next_page_url)">
                        Next
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import store from "../store";
import router from "../router";

export default {
    name: "Post",
    data: () => ({
        posts: {  },
        search: {
            query: '',
            category: '',
            queryCategory: '',
        },
        url: '/api/post?',
        pagination: [],
    }),
    mounted(){
        this.getPost();
    },
    methods: {
        getPost(query='', category='', queryCategory='', setQueryFalg = 0) {
            let $this = this
            if(setQueryFalg){
                this.search.query = query;
                this.search.category = category;
                this.search.queryCategory = queryCategory;
                this.url = this.pagination.first_page_url;
            }
            console.log("URL : " + this.url+'&search='+ this.search.query+'&category'+this.search.category+'&search-type='+this.search.queryCategory)
            axios.get(this.url+'&search='+ this.search.query+'&category='+this.search.category+'&search-type='+this.search.queryCategory)
                .then(response => {
                    if(response.data){
                        console.log(response.data.posts)
                        this.posts = response.data.posts.data;
                        // if(query){
                        //     this.$router.replace('/post?search='+query);
                        // }
                        $this.makePaginagion(response.data.posts);
                    }
                }).catch(errors => {Toast.fire({icon: 'error', title: errors.message}) });
        },

        makePaginagion(data){
            let pagination = {
                current_page: data.current_page,
                last_page:     data.last_page,
                first_page_url: data.first_page_url,
                next_page_url: data.next_page_url,
                prev_page_url: data.prev_page_url,
                total_item:    data.total,
                from_item:     data.from,
                to_item:       data.to,
            }
            this.pagination = pagination;
        },

        fetchPaginagion(url){
            this.url = url
            this.getPost('', '', '',false)
        }
    },

}
</script>

<style scoped>

</style>
