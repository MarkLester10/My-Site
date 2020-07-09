<template>
      <!-- @if ($posts->count() > 0)
       @foreach ($posts as $post) -->
       <div class="post-preview">
           <a :href="slug">
             <h2 class="post-title">
               {{ title }}
             </h2>
             <h3 class="post-subtitle">
               {{ subtitle }}
             </h3>
           </a>
           <!-- @foreach ($post->tags as $tag) -->
           <small class="text-success" v-for="tag in tag_name" :key="tag.id">#{{ tag.name }}</small>
           <!-- @endforeach -->
           <p class="post-meta">Posted {{ created_at}} by
             <a href="#">Start Bootstrap</a>
             {{created_at}}
             <br>
             <a href="#" @click.prevent="likeIt" class="text-decoration-none">
                 <small>{{ likeCount }}</small>
                 <i class="fa fa-heart" style="color:red;" v-if="likeCount > 0" aria-hidden="true"></i>
                 <i class="fa fa-heart" v-else aria-hidden="true"></i>
            </a>
            </p>
         </div>
         <!-- <hr>
       @endforeach
       @else
       <h3 class="post-subtitle">No Post Added Yet</h3>
       @endif -->
</template>

<script>
    export default {
       mounted(){
           console.log('Component Mounted');
       },
        props:[
          'title',
          'subtitle',
          'created_at',
          'tag_name',
          'slug',
          'postId',
          'login',
          'likes'
      ],
       data:function(){
           return{
               likeCount:0,
           }
       },
        created(){
            this.likeCount = this.likes;
        },
      methods:{
          likeIt(){
           if(this.login){
             this.$Progress.start()
             axios.post('/saveLike',{
                 id:this.postId
            })
            .then((response)=> {
            if(response.data === 'deleted'){
                this.likeCount-=1;
                this.$Progress.finish();
            }else{
                this.likeCount+=1;
                Toast.fire({
                icon: "success",
                title: `Thanks for the &nbsp<i class="fa fa-heart heart"></i>`
                });
                this.$Progress.finish();
                // console.log(response)
            }
            })
            .catch((error)=> {
                console.log(error)
            this.$Progress.fail();
             Toast.fire({
            icon: "error",
            title: "Something went wrong"
          });
            });
           }else{
               window.location = 'login';
           }
          }
      }
    }
</script>

<style>
 .heart{
        color:red;
    }
</style>
