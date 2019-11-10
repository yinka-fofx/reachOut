<template>
    <div class="panel-footer">

        <a @click="unlike()" class="btn btn-sm btn-danger" v-if="causeData.is_liked">Unlike</a>

        <a @click="like()" class="btn btn-sm btn-success" v-else>Like</a>

    </div>
</template>

<script>
export default {
    props : {
        cause : Object
    },
    data(){
        return {
            causeData : this.cause
        }
    },
    methods : {
        like : function () {
            this.makeRequest(this.causeData.links.like)
        },
        unlike : function() {
            this.makeRequest(this.causeData.links.unlike)
        },
        makeRequest : function(url) {
            axios({
                method : 'POST',
                url : url,
                data : {}
            }).then((res) => {
                this.causeData = res.data.data
            }).catch((error) => {
                alert(
                    'There was an error performing this operation'
                )
            })
        }
    }
}
</script>

