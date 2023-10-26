<template>
    <div class="modal" id="myModal">
    <div class="modal-dialog" style="width: 60% !important;">
        <div class="modal-content">
            <button @click="close" type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="fas fa-times"></i>
                </button>
            <div style="padding: 0px 100px 60px 60px;">
                <br>
                <h2><center>Informasi PickUp Order</center></h2>
                <form @submit.prevent="createPickup" class="form-horizontal form-label-left">
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Pengirim</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input v-model="formData.pengirim" type="text" class="form-control" placeholder="Masukkan Pengirim">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Dituju</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input v-model="formData.namaDituju" type="text" class="form-control" placeholder="Nama Dituju">
                     </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input v-model="formData.alamat" type="text" class="form-control" placeholder="Alamat">
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Penerima</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input v-model="formData.namaPenerima" type="text" class="form-control" placeholder="Nama Penerima">
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">TELP</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input v-model="formData.telp" type="text" class="form-control" placeholder="Nomor Telp" >
                     </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Kota</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <!-- <select v-model="formData.kota" class="form-control" name="POrderDest" required>
                        <option v-for="item in dataCity" :key="item.ID" :value="item.CityCode">{{ item.CityName }} ,{{ item.CityLurah }}, {{ item.CityCamat }}, {{ item.CityLurah }}, {{ item.CityProv }}</option>
                      </select>
                      <button class="btn btn-parimary">Cari Data</button> -->
                      <vue3-select v-model="formData.kota" :options="dataCity" search placeholder="Pilih Kota"
                      @search="handleSearch" @scroll="handleScroll"></vue3-select>
                     </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Isi Kiriman</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input v-model="formData.isiKiriman" type="text" class="form-control" placeholder="Isi Kiriman">
                     </div>
                  </div>

                  <div class="d-flex weight">
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Berat</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input v-model="formData.berat" type="text" class="form-control" placeholder="Berat">
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Banyak</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input v-model="formData.banyak" type="number" class="form-control" placeholder="Banyak">
                    </div>
                  </div>
                </div>

                <div class="d-flex weight">
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Packing</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <select v-model="formData.packing" class="form-control" >
                        <option value="0">Tidak Packing</option>
                        <option value="1">Kayu</option>
                        <option value="2">Bubble Warp</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nilai Barang</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input v-model="formData.nilaiBarang" type="text" class="form-control" placeholder="Nilai Barang">
                     </div>
                  </div>
                </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Layanan</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <select v-model="formData.layanan" class="form-control">
                        <option v-for="item in dataService" :key="item.id" :value="item.id" selected>{{ item.ServiceName }}</option>
                      </select>
                     </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input v-model="formData.keterangan" type="text" class="form-control" placeholder="Keterangan" >
                    </div>
                  </div>

                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                      <input type="submit" class="btn btn-success col-sm-3 float-right" value="Submit"/>
                      <button @click="close" class="btn btn-danger col-sm-3 float-right">Batal</button>
                    </div>
                  </div>

                </form>
              </div>
        </div>
    </div>
</div>

 </template>

 <script>
 import Vue3Select from "vue3-select";
 import 'vue3-select/dist/vue3-select.css';
 import { ref } from 'vue'
 import useValidate from '@vuelidate/core'
 import { required, numeric, maxLength, helpers, email } from '@vuelidate/validators'
 import { add_data_pickup } from '../api/api_helpers'
 import { mapGetters } from 'vuex'


     export default {
        components: {
            "vue3-select": Vue3Select,
        },
        data() {
             return {
                v$: useValidate(),
                isLoading: false,
                visibleOptions: [],
                searchQuery: '',
                currentPage: 1,
                itemsPerPage: 10,
                dataCity: ref([]),
                dataService: [],
                formData: {
                    pengirim: '',
                    namaDituju: '',
                    alamat: '',
                    namaPenerima: '',
                    telp: '',
                    kota: '',
                    isiKiriman: '',
                    berat: '1',
                    banyak: 1,
                    packing: 0,
                    nilaiBarang: 1,
                    layanan: '',
                    keterangan: ''
                }
            }
         },
         validations() {
             return {
                formData: {
                    pengirim: {
                        required: helpers.withMessage('Pengirim harus diisi!', required)
                    },
                    namaDituju: {
                        required: helpers.withMessage('Nama Dituju harus diisi!', required)
                    },
                    alamat: {
                        required: helpers.withMessage('Alamat harus diisi!', required)
                    },
                    namaPenerima: {
                        required: helpers.withMessage('Nama Penerima harus diisi!', required)
                    },
                    telp: {
                        required: helpers.withMessage('Telpon harus diisi!', required)
                    },
                    kota: {
                        required: helpers.withMessage('Kota harus diisi!', required)
                    },
                    isiKiriman: {
                        required: helpers.withMessage('Isi kiriman harus diisi!', required)
                    },
                    berat: {
                        required: helpers.withMessage('Berat harus diisi!', required)
                    },
                    banyak: {
                        required: helpers.withMessage('Banyak harus diisi!', required)
                    },
                    packing: {
                        required: helpers.withMessage('Packing harus diisi!', required)
                    },
                    pengirim: {
                        required: helpers.withMessage('Pengirim harus diisi!', required)
                    },
                    nilaiBarang: {
                        required: helpers.withMessage('Nilai Barang harus diisi!', required)
                    },
                    layanan: {
                        required: helpers.withMessage('Layanan harus diisi!', required)
                    },
                    // keterangan: {
                    //     required: helpers.withMessage('Keterangan harus diisi!', required)
                    // },
             }
             };
         },
         computed: {
            ...mapGetters({
                dataPicOrd: 'pickup/getDataPickups',
            }),
        },
         mounted() {
            // Toast.success('Operation successful!');
            // this.dataCity = this.$parent.dataCity
            this.getDataCity()
            this.dataService = this.$parent.dataService
            if (this.dataService.length > 0) {
                this.formData.layanan = this.dataService[0].id;
                }
            console.debug(this.$parent.dataService)
         },
         methods: {
            getDataCity(){
                // this.dataCity =
                // const options = this.$parent.dataCity.map(item => ({ value: item.ID, label: `${ item.CityName } ,${ item.CityLurah }, ${ item.CityCamat }, ${ item.CityLurah }, ${ item.CityProv }` }));
                // console.debug('options',options)
                // this.dataCity = options
                // this.isLoading = true;
                // setTimeout(() => {
                    const options = this.$parent.dataCity.map(item => ({ value: item.CityCode, label: `${ item.CityName } ,${ item.CityLurah }, ${ item.CityCamat }, ${ item.CityLurah }, ${ item.CityProv }` }));
                    this.dataCity = options
                    this.handleSearch()
                    // this.isLoading = false;
                // }, 1000);
            },
            handleSearch() {
                this.currentPage = 1;
                if (this.searchQuery === '') return
                this.filterCities();
            },
            handleScroll(scrollInfo) {
                if (scrollInfo.direction === 'down') {
                    if (this.currentPage * this.itemsPerPage < this.dataCity.length) {
                    this.currentPage++;
                    }
                }
                this.updateVisibleOptions();
            },
            filterCities() {
                const start = (this.currentPage - 1) * this.itemsPerPage;
                const end = start + this.itemsPerPage;
                this.visibleOptions = this.dataCity
                    .filter(option => option.label.toLowerCase().includes(this.searchQuery.toLowerCase()))
                    .slice(start, end);
            },
            updateVisibleOptions() {
                this.filterCities();
            },
            close(){
                this.$parent.popupCreate = false
            },
            async createPickup(){
                this.v$.$validate()
                if (this.v$.$error) {
                    console.debug('msg err',this.v$.formData.layanan.$errors[0])
                    this.showErr()
                    return;
                }

                const param = {
                    POrderRecvPerson: this.formData.pengirim,
                    POrderRecvName: this.formData.namaDituju,
                    POrderRecvAddr: this.formData.alamat,
                    POrderRecvName: this.formData.namaPenerima,
                    POrderRecvTelp: this.formData.telp,
                    POrderDest: this.formData.kota.value,
                    POrderIsi: this.formData.isiKiriman,
                    POrderWeight: this.formData.berat,
                    POrderQty: this.formData.banyak,
                    POrderPack: this.formData.packing,
                    POrderService: this.formData.layanan,
                    POrderMemo: this.formData.keterangan,
                    customer_id: JSON.parse(localStorage.Users).customer_id,
                    POrderDEO: JSON.parse(localStorage.Users).name,
                    POrderLocation: JSON.parse(localStorage.Users).UserLocation,
                }
                const result = await this.$store.dispatch('pickup/addDataPickup',param)

                this.$toast.success(result.message);
                this.$parent.popupCreate = false

                console.debug('parameter', this.dataPicOrd)
            },
            showErr(){
                if (this.v$.formData.pengirim.$error){
                    this.$toast.error(this.v$.formData.pengirim.$errors[0].$message);
                    return
                }
                if (this.v$.formData.namaDituju.$error){
                    this.$toast.error(this.v$.formData.namaDituju.$errors[0].$message);
                    return
                }
                if (this.v$.formData.alamat.$error){
                    this.$toast.error(this.v$.formData.alamat.$errors[0].$message);
                    return
                }
                if (this.v$.formData.namaPenerima.$error){
                    this.$toast.error(this.v$.formData.namaPenerima.$errors[0].$message);
                    return
                }
                if (this.v$.formData.telp.$error){
                    this.$toast.error(this.v$.formData.telp.$errors[0].$message);
                    return
                }
                if (this.v$.formData.kota.$error){
                    this.$toast.error(this.v$.formData.kota.$errors[0].$message);
                    return
                }
                if (this.v$.formData.isiKiriman.$error){
                    this.$toast.error(this.v$.formData.isiKiriman.$errors[0].$message);
                    return
                }
                if (this.v$.formData.berat.$error){
                    this.$toast.error(this.v$.formData.berat.$errors[0].$message);
                    return
                }
                if (this.v$.formData.banyak.$error){
                    this.$toast.error(this.v$.formData.banyak.$errors[0].$message);
                    return
                }
                if (this.v$.formData.packing.$error){
                    this.$toast.error(this.v$.formData.packing.$errors[0].$message);
                    return
                }
                if (this.v$.formData.layanan.$error){
                    this.$toast.error(this.v$.formData.layanan.$errors[0].$message);
                    return
                }
            }
         },
     }
 </script>

<style>
.modal {
    display: block !important;
    background-color: rgba(0, 0, 0, 0.5);
}
</style>
