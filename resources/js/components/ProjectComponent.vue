<template>
    <div class="container font-form">

            <div class="justify-content-center">
                <form @submit="submit" enctype="multipart/form-data">

                    <div v-if="step === 0">
                            <Loading :active.sync="isLoading"
                                     :can-cancel="true"
                                     :loader="loader"
                                     :on-cancel="onCancel"
                                     :width="110"
                                     :height="110"
                                     :opacity=0.5
                                   ></Loading>
                            <br>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-8 col-12" v-for="child in childs">
                                    <div class="card" style="width: 16rem;">
                                        <img class="card-img-top card-image"  :src="child.image_icon"  alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">{{child.name}}</h5>
                                            <p class="card-text text-center">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                        <button @click.prevent="next(child.id)" class="btn" style="background:black; color:#c6c8ca">Get start</button>

                                    </div>
                                </div>
                            </div>
                    </div>
                    <fieldset class="justify-content-center" v-if="step === 1">
                        <div class="vld-parent panel-body">
                            <Loading :active.sync="isLoading"
                                     :can-cancel="true"
                                     :loader="loader"
                                     :on-cancel="onCancel"
                                     :width="110"
                                     :height="110"
                                     :opacity="0.5"
                            ></Loading>
                            <br>
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12" v-for="child in childs">
                                    <div class="card" style="width: 16rem;">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">{{child.name}}</h5>
                                            <p class="card-text">Some quick example text to build on the image title and make up the bulk of the image's content.</p>
                                        </div>
                                        <button @click.prevent="next(child.id)" class="btn" style="background:black; color:#c6c8ca">Checked</button>
                                    </div>
                                </div>
                            </div>
                            <button @click.prevent="prev()" class="btn" style="background:black; color:#c6c8ca">previous</button>
                        </div>
                    </fieldset>
                    <fieldset v-if="step === 2 && this.childs.length !== 0 && steps[steps.length -1] !== 83">

                        <div class="vld-parent panel-body">
                            <Loading :active.sync="isLoading"
                                     :can-cancel="true"
                                     :loader="loader"
                                     :on-cancel="onCancel"
                                     :width="110"
                                     :height="110"
                                     :opacity="0.5"
                            ></Loading>
                            <br>
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 " v-for="child in childs">
                                    <div class="card" style="width: 16rem;">
                                        <img class="card-img-top card-image" :src="child.image_icon"  alt="Card image cap">
                                        <div class="card-body">
                                            <h6 class="card-text text-center">{{child.name}}</h6>
                                        </div>
                                        <button @click.prevent="next(child.id)" class="btn" style="background:black; color:#c6c8ca">Checked</button>
                                    </div>
                                </div>
                            </div>
                            <button @click.prevent="prev()" class="btn" style="background:black; color:#c6c8ca">previous</button>

                        </div>
                    </fieldset>
                    <fieldset v-else-if="step === 3 && this.childs.length !== 0 || steps[steps.length -1] === 83">
                        <div class="vld-parent panel-body">

                            <Loading :active.sync="isLoading"
                                     :can-cancel="true"
                                     :loader="loader"
                                     :on-cancel="onCancel"
                                     :width="110"
                                     :height="110"
                                     :opacity="0.5"
                            ></Loading>
                            <br>
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6" v-for="child in childs">
                                    <div class="card " style="width: 16rem;">
                                        <img class="card-img-top" style="width: 16rem; height: 14rem;" v-bind:src="mouseOverCheck === child.id ? child.image : child.image_opacity" v-on:mouseover="mouseOverCheck = child.id"  v-on:mouseout="mouseOverCheck = ''"/>
                                        <div class="card-body">
                                            <h6 class="card-text text-center">{{child.name}}</h6>
                                        </div>
                                        <button @click.prevent="next(child.id)"  v-model="project.category_id = child.id" class="btn" style="background:black; color:#c6c8ca">Checked</button>
                                    </div>
                                </div>
                            </div>
                            <button @click.prevent="prev()" class="btn" style="background:black; color:#c6c8ca">previous</button>
                        </div>
                    </fieldset>
                    <fieldset v-else-if="step === 3 && this.childs.length === 0 || step === 4 || step === 2 && this.childs.length === 0">
                        <div class="panel-body">
                            <Loading :active.sync="isLoading"
                                     :can-cancel="true"
                                     :loader="loader"
                                     :on-cancel="onCancel"
                                     :width="110"
                                     :height="110"
                                     :opacity="0.5"
                            ></Loading>
                            <h3 class="text-center">Answer the questionnaire</h3>
                            <div v-if="errors.length" class="alert alert-dark" role="alert">
                                <b>Please correct the following error(s):</b>
                                <ul>
                                    <li v-for="error in errors">{{ error }}</li>
                                </ul>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-6 co-sm-12 form-group">
                                    <label>Project Name</label>
                                    <input class="form-control" type="text" v-model="project.name" placeholder="flat build">
                                </div>
                                <div class="col-lg-6 co-sm-12 form-group" >
                                    <label for="budgets">select Style</label>
                                    <select v-on:click="getstyle" id="budgets" class="form-control" v-model="project.style_id">
                                        <option v-for="style in styles" v-bind:value="style.id">
                                            {{ style.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-6 co-sm-12 form-group">
                                    <label>Upload File Design</label>
                                    <input class="form-control" type="file" v-on:change="onFileChange" >
                                </div>
                                <div class="col-lg-3 co-sm-6 form-group">
                                    <label>Budget</label>
                                    <input class="form-control" type="number" v-model="budgets.budget_from" placeholder="1000">
                                </div>
                                <div class="col-lg-3 co-sm-6 form-group">
                                    <label>To:</label>
                                    <input class="form-control" type="number" v-model="budgets.budget_to" placeholder="2000" v-on:change="sum">
                                </div>

                            </div>

                            <div class="row form-group">
                                <div class="col-lg-4 col-sm-12 form-group">
                                    <label>reference</label>
                                    <input class="form-control" type="url" v-model="project.references.link1" placeholder="www.example.com">
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label>reference</label>
                                    <input class="form-control" type="url" v-model="project.references.link2" placeholder="www.example.com">
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label>reference</label>
                                    <input class="form-control" type="url" v-model="project.references.link3" placeholder="www.example.com">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="anext">Description</label>
                                <textarea v-model="project.description" class="form-control" name="next" id="anext" cols="50" rows="5">

                                </textarea>
                            </div>
                            <button class="btn" style="background:black; color:#c6c8ca">save</button>
                            <button @click.prevent="prev()" class="btn" style="background:black; color:#c6c8ca">previous</button>

                        </div>
                    </fieldset>
                </form>
                <div v-if="step === 5">
                    <div class="card-body pt-0">
                        <h4 class="heading mb-4 pb-1 text-center">Confirmation</h4>
                            <p class="text-center">Form has been submitted Successfully ! <br>You will recieve estimation on your email id
                                and contact no.</p>
                        <div class="row justify-content-center"> <img src="https://i.imgur.com/krsWHvd.gif"
                                                                      class="check">
                        </div>
                    </div>
                </div>
            </div>

    </div>
</template>
<script>

    import Loading from 'vue-loading-overlay';
    import 'vue-loading-overlay/dist/vue-loading.css';
    export default {
        data() {
            return {
                file:'',
                successes:[],
                styles:[],
                budgets:{
                    budget_from:'',
                    budget_to:'',
                },
                steps:[],
                errors:[],
                step: 0,
                project:{
                  style_id:'' ,
                  category_id:'',
                  name:'',
                  budget:'',
                  description:'',
                    references:{
                        link1:'',
                        link2:'',
                        link3:''
                    },
                },
                mouseOverCheck: '',
                childs:[],
                child:[],

                isLoading: false,
                fullPage: true,
                loader:"dots",


            }
        },
        created(){
            this.getchild(parent)

        },
        methods:{
            prev() {
                this.isLoading = true;
                setTimeout(()=>{
                    axios.get('grandparent/'+ this.steps[this.steps.length -1]).then(response=>{this.childs = response.data;});
                    this.steps.pop();
                    this.step--;
                    this.isLoading = false;
                },2000)
            },
            next(parent) {
                this.isLoading = true;
                setTimeout(() => {
                    axios.get('category/'+ parent).then(response=>{this.childs = response.data;});
                    this.step++;
                    this.steps.push(parent);
                    this.isLoading = false;
                },2000);
               
            },
            submit(e) {


                let formData = new FormData();
                if (this.file !=null || this.file !== undefined ) {
                    formData.append('file', this.file);
                }
                formData.append('category_id', this.project.category_id);
                formData.append('style_id', this.project.style_id);
                formData.append('description', this.project.description);
                formData.append('link1', this.project.references.link1);
                formData.append('link2', this.project.references.link2);
                formData.append('link3', this.project.references.link3);
                formData.append('name', this.project.name);
                formData.append('budget', this.project.budget);

                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                };

                if ((this.budgets.budget_to - this.budgets.budget_from) > 0 && this.project.name && this.project.description && this.project.style_id) {
                    axios.post('createproject',formData,config).then(res =>{

                    }).catch(err=>{
                       this.errors.push(err);
                    });
                    this.isLoading = true;
                    setTimeout(() => {
                        this.step++;
                        this.isLoading = false;
                    },2000);
                }

                this.errors = [];

                if ((this.budgets.budget_to - this.budgets.budget_from) < 0) {
                    this.errors.push('Budget not correct.');
                }
                if (!this.project.name) {
                    this.errors.push('Name required.');
                }
                if (!this.project.description) {
                    this.errors.push('Description required.');
                }
                if (!this.project.style_id) {
                    this.errors.push('Style required.');
                }

                e.preventDefault();

            },
            getchild(){
                axios.get('category').then(response=>{
                    this.childs = response.data;
                    console.log("hi")
                })
            },
            getchilds(parent){
                axios.get('category/'+ parent).then(response=>{
                    this.childs = response.data;
                    console.log("hi")
                })
            },
            getstyle(){
                axios.get('styles/'+ this.steps[this.steps.length -1]).then(res=>{
                    this.styles = res.data;
                })
            },
            sum(){
                this.project.budget = this.budgets.budget_from + ' - '+ this.budgets.budget_to ;
            },
            onCancel() {
                console.log('User cancelled the loader.')
            },
            onFileChange(e){
                console.log(e.target.files[0]);
                this.file = e.target.files[0];
            }
        },
        components: {
            Loading
        },
    }
</script>

<style scoped>

.font-form{
    font-family: "Open Sans Semibold";
}
/*@media only screen and (max-width: 768px) {*/
    /*!* For mobile phones: *!*/
  /*.card{*/
      /*display: none;*/
  /*}*/
/*}*/
.card-image{
    width: 90px;
    height: 90px;
    margin: auto;
    padding: 10px;
}
.card-image:hover{
    opacity: 1;

}
button:hover{
    opacity: 0.7;
}
</style>