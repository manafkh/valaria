<template>
    <div class="font-form">
            <div class="container position-relative">
                <form @submit="submit" enctype="multipart/form-data">

                    <div v-if="step === 0" >
                        <Loading :active.sync="isLoading"
                                 :can-cancel="true"
                                 :loader="loader"
                                 :on-cancel="onCancel"
                                 :width="110"
                                 :height="110"
                                 :opacity="1"
                        ></Loading>
                        <br>
                        <div class="row align-content-center">
                            <div class="col-lg-4 col-md-4 col-sm-6" v-for="(child,childname) in childs">
                                <div @click.prevent="next(child.id)" v-tooltip="child.category_details ? child.category_details.description : 'no description'" class="card" style="width: 16rem; cursor:pointer;">
                                    <img class="card-img-top card-image" :src="child.image_icon"  alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-title text-center"><strong>{{child.name}}</strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <fieldset v-if="step === 1">
                        <div class="vld-parent panel-body">
                            <Loading :active.sync="isLoading"
                                     :can-cancel="true"
                                     :loader="loader"
                                     :on-cancel="onCancel"
                                     :width="110"
                                     :height="110"
                                     :opacity="1"
                            ></Loading>
                            <br>
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12" v-for="child in childs">
                                    <div @click.prevent="next(child.id)" class="card" v-tooltip="child.category_details ? child.category_details.description : 'no Description'" v-model="project.category_id = child.id" style="width: 16rem; cursor:pointer;">
                                        <img v-if="child.image_icon != null" class="card-img-top card-image" :src="child.image_icon"  alt="Card image cap">
                                        <img v-else-if="child.image != null" class="card-img-top" style="width: 16rem; height: 14rem;  border-radius: 12px; padding: 5px;" v-bind:src="mouseOverCheck === child.id ? child.image : child.image_opacity" v-on:mouseover="mouseOverCheck = child.id"  v-on:mouseout="mouseOverCheck = ''"/>
                                        <div v-if="child.image === null" class="card-body">
                                            <h5 class="card-title text-center">{{child.name}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button @click.prevent="prev()" class="btn">previous</button>
                        </div>
                    </fieldset>
                    <fieldset v-if="step === 2 && this.childs.length !== 0">

                        <div class="vld-parent panel-body">
                            <Loading :active.sync="isLoading"
                                     :can-cancel="true"
                                     :loader="loader"
                                     :on-cancel="onCancel"
                                     :width="110"
                                     :height="110"
                                     :opacity="1"
                            ></Loading>
                            <br>
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 " v-for="child in childs">
                                    <div v-on:click="getstyle(child.id)" @click.prevent="next(child.id)" class="card" v-tooltip="child.category_details ? child.category_details.description : 'no Description'" v-model="project.category_id = child.id" style="width: 16rem; cursor:pointer;">
                                        <img v-if="child.image_icon != null" class="card-img-top card-image" :src="child.image_icon"  alt="Card image cap">
                                        <img v-else-if="child.image != null" class="card-img-top" style="width: 16rem; height: 14rem; border-radius: 12px; padding: 5px;" v-bind:src="mouseOverCheck === child.id ? child.image : child.image_opacity" v-on:mouseover="mouseOverCheck = child.id"  v-on:mouseout="mouseOverCheck = ''"/>
                                        <div v-if="child.image === null" class="card-body">
                                            <h6 class="card-text text-center">{{child.name}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button @click.prevent="prev()" class="btn">previous</button>

                        </div>
                    </fieldset>
                    <fieldset v-else-if="step === 3 && this.childs.length !== 0">
                        <div class="vld-parent panel-body">

                            <Loading :active.sync="isLoading"
                                     :can-cancel="true"
                                     :loader="loader"
                                     :on-cancel="onCancel"
                                     :width="110"
                                     :height="110"
                                     :opacity="1"
                            ></Loading>
                            <br>
                            <div class="row align-content-center">
                                <div  class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12" v-for="child in childs" >
                                    <div v-on:click="getstyle(child.id)"  @click.prevent="next(child.id)" class="card" v-tooltip="child.category_details ? child.category_details.description : 'no Description'"  v-model="project.category_id = child.id" style="width: 16rem; cursor:pointer;">
                                        <img v-if="child.image_icon != null" class="card-img-top card-image" :src="child.image_icon"  alt="Card image cap">
                                        <img v-else-if="child.image != null" class="card-img-top" style="width: 16rem; height: 14rem; border-radius: 12px; padding: 5px;" v-bind:src="mouseOverCheck === child.id ? child.image : child.image_opacity" v-on:mouseover="mouseOverCheck = child.id"  v-on:mouseout="mouseOverCheck = ''"/>
                                        <div v-if="child.image === null" class="card-body">
                                            <h6 class="card-text text-center">{{child.name}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button @click.prevent="prev()" class="btn">previous</button>

                        </div>
                    </fieldset>
                    <fieldset v-else-if="step === 3 && this.childs.length === 0 || step === 4 || step === 2 && this.childs.length === 0"  style="box-shadow:dimgrey -1px 5px 5px 7px;">
                        <div class="panel-body" >
                            <Loading :active.sync="isLoading"
                                     :can-cancel="true"
                                     :loader="loader"
                                     :on-cancel="onCancel"
                                     :width="110"
                                     :height="110"
                                     :opacity="1"
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
                                <div v-if="styles.length !== 0" class="col-lg-6 co-sm-12 form-group" >
                                    <label for="budgets">select Style</label>
                                    <select id="budgets" class="form-control" v-model="project.style_id">
                                        <option v-for="style in styles" v-bind:value="style.id">
                                            {{ style.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-6 co-sm-12 form-group">
                                    <label>Upload File Design</label>
                                    <input class="form-control" type="file" ref="file" multiple="multiple" >
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
                                    <input class="form-control" type="text" v-model="project.references.link1" placeholder="www.example.com">
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label>reference</label>
                                    <input class="form-control" type="text" v-model="project.references.link2" placeholder="www.example.com">
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label>reference</label>
                                    <input class="form-control" type="text" v-model="project.references.link3" placeholder="www.example.com">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="anext">Description</label>
                                <textarea v-model="project.description" class="form-control" name="next" id="anext" cols="50" rows="5">

                                </textarea>
                            </div>
                            <div class="form-group">
                                <button @click.prevent="prev()" class="btn pull-left">previous</button>
                                <button  class="btn pull-right " >Confirm</button>
                            </div>


                        </div>
                    </fieldset>
                </form>
                <div v-if="step === 5">
                    <div class="card-body pt-0">
                        <h4 class="heading mb-4 pb-1 text-center">Confirmation</h4>
                        <p class="text-center">Form has been submitted Successfully ! <br>You will recieve estimation on your email id
                            and contact no.</p>
                        <div class="row justify-content-center"> <img src="assets\img\form.gif" style="  max-width: 75%;box-shadow: 5px 5px 5px dimgrey;" class="check">
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
                file:[],
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
                },4000)
            },
            next(parent) {
                this.isLoading = true;
                axios.get('category/'+ parent).then(response=>{this.childs = response.data;});
                setTimeout(() => {

                    this.step++;
                    this.steps.push(parent);
                    this.isLoading = false;
                },4000);
               
            },
            submit(e) {



                let formData = new FormData();
                for( var i = 0; i < this.$refs.file.files.length; i++ ){
                    let file = this.$refs.file.files[i];
                    formData.append('files[' + i + ']', file);
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

                if ((this.budgets.budget_to - this.budgets.budget_from) >= 0 && this.project.name && this.project.description ) {
                    axios.post('createproject',formData,config).then(res =>{
                                console.log(res.data);
                    }).catch(err=>{
                       this.errors.push(err);
                    });
                    this.isLoading = true;
                    setTimeout(() => {
                        this.step = 5;
                        this.isLoading = false;
                    },4000);
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
            getstyle(style_id){
                axios.get('styles/'+ style_id).then(res=>{
                    this.styles = res.data;
                    console.log(this.styles);
                })
            },
            sum(){
                this.project.budget = this.budgets.budget_from + '-'+ this.budgets.budget_to +'$' ;
            },
            onCancel() {
                console.log('User cancelled the loader.')
            },

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

.card-image{
    width: 90px;
    height: 90px;
    margin: auto;
    padding: 10px;
}
.card-image:hover{
    opacity: 1;

}
button {
    background:black;
    color:#c6c8ca ;
}
button:hover{
    background:#c6c8ca;
    color: #0c0c0c;
}
.card:hover{
    background: #0c0c0c;
    color: #c6c8ca;
    box-shadow: 5px 5px 5px dimgrey;
}

</style>