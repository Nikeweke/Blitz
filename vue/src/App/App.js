import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import axios  from 'axios';

export default {

  data () {
    return {
       server: 'http://localhost:8000'
    }
  },


  methods: {

    // make requests to test Api of Server(Slim php)
    testRequest(){
       // POST
       this.makeReq(this.server + '/t', 'post', {data: 'hello animals'}).then(res =>{
          console.log(res.data);
       })

       // PUT
       this.makeReq(this.server + '/t', 'put', {data: 'hello hipo'}).then(res =>{
          console.log(res.data);
       })


        // DELETE
       this.makeReq(this.server + '/t', 'delete', {data: 'hello girafo'}).then(res =>{
          console.log(res.data);
       })
    },


    // Make request with axios
    makeReq(url, method, postData){

          var headers = {};
          // var headers = {
             // 'Content-Type': 'application/x-www-form-urlencoded',
          // };

          method   = method   ? method   : 'get';
          postData = postData ? postData : {};

          return axios[method]
                    (url, postData, {headers: headers})
                       .then(res => {  return res; } )
                           .catch(err  => console.log(error) );

    }


  },








}
