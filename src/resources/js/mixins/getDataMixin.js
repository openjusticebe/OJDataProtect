export default {
    props: ['page_url'],
  
    data() {
      return {
        // edit: false,
        // add_new: false,
        fields: {},
        error: null,
        errors: {},
        data_fetched: false,
        loaded: true,
      }
    },
    mounted() {
    },
    created() {
      this.fetchData(this.page_url);
    },
    methods: {
      // isEmpty (obj) {
      //   return Object.keys(obj).length === 0;
      // },
      fetchData(page_url){
        axios.get(page_url)
        .then((response) =>{
          if(response.status == 200){
            this.fields = response.data.data;
            this.data_fetched = true;
          }
        }).catch(err=>{
          console.log(err)
        });
      },
  },
  }
  