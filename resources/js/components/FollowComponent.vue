<template>
    <div class="card-text">
        <a @click="unfollow()" class="btn btn-sm btn-danger" v-if="causeData.is_follower">nonparticipant
            <span>{{ causeData.user_count }}</span>
        </a>
        <a @click="follow()" class="btn btn-sm btn-success" v-else> Participant
            <span>{{ causeData.user_count }}</span>
        </a>
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
        follow : function () {
            this.makeRequest(this.causeData.links.Participant)
        },
        unfollow : function() {
            this.makeRequest(this.causeData.links.nonparticipant)
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

