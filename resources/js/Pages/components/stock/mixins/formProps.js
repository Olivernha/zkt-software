export default {
    props: {
        title:{
            type:String,
            required:true
        },
        data:{
            type:Object,
            required:false
        }
    },
    emits:['submit']
}

