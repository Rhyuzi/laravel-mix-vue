<template>
    <TambahPickup v-if="popupCreate"></TambahPickup>
    <Loading v-if="isLoading"></Loading>

                <div class="">
                    <SideBar></SideBar>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Pickup <small>Pelanggan</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                            <div class="col-sm-6">
                                <div id="datatable_filter" class="">
                                    <label>Search:<input v-model="searchText" type="search" class="form-control input-sm" placeholder="" aria-controls="datatable">
                                    </label>
                                    <button @click="search">Search</button>
                                </div>
                            </div>
                        </div>

                    <Vue3EasyDataTable :headers="headers" :items="filteredData" @click-row="handleRowClick"/>
                     </div>
                </div>
              </div>
</template>

<script>
// import { DataTable } from "@jobinsjp/vue3-datatable"
import { mapGetters } from 'vuex'
import SideBar from './SideBar.vue';
import Vue3EasyDataTable from 'vue3-easy-data-table'
import { get_data_city, getCoverageArea, get_data_service, getTrackingById } from '../api/api_helpers'
import 'vue3-easy-data-table/dist/style.css';
import TambahPickup from './PopupTambahPickup.vue';
import Loading from './Loading.vue';

    export default {
        components: {
            SideBar,
            Loading,
            Vue3EasyDataTable,
            TambahPickup
        },
        data() {
            return {
                searchText: "",
                popupCreate: false,
                isLoading: false,
                dataCity: [],
                dataService: [],
                pagination: null,
                headers: [
                    { text: "ID", value: "ID" },
                    { text: "NO.RESI", value: "ConnoteNo"},
                    { text: "DIBUAT", value: "CreateTime"},
                    { text: "PENGIRIM", value: "ConnoteCustName"},
                    { text: "PENERIMA", value: "ConnoteRecvName"},
                    { text: "ISI BARANG", value: "ConnoteContents"},
                    // { text: "WEIGHT (lbs)", value: "indicator.weight", sortable: true},
                    // { text: "LAST ATTENDED", value: "lastAttended", width: 200},
                    // { text: "COUNTRY", value: "country"},
                ],
                filteredData: [],
            }
        },
        computed: {
            ...mapGetters({
                dataTrack: 'tracking/getDataTracking',
            }),

            // filteredData() {
            //     if (this.searchText.trim() === "") {
            //         return this.dataTrack;
            //     }
            //     return this.dataTrack.filter((item) => {
            //     return (
            //         String(item.ID).toLowerCase().includes(this.searchText.toLowerCase()) ||
            //         String(item.ConnoteNo).toLowerCase().includes(this.searchText.toLowerCase()) ||
            //         String(item.CreateTime).toLowerCase().includes(this.searchText.toLowerCase()) ||
            //         String(item.ConnoteCustName).toLowerCase().includes(this.searchText.toLowerCase()) ||
            //         String(item.ConnoteRecvName).toLowerCase().includes(this.searchText.toLowerCase()) ||
            //         String(item.ConnoteContents).toLowerCase().includes(this.searchText.toLowerCase())
            //     );
            // });
            // }
        },
        async mounted() {
            await this.getDataTracking()
        },
        methods: {
            async getDataTracking() {
                this.isLoading = true
                await this.$store.dispatch('tracking/getDataTracking')
                console.error('ie yeh', this.dataTrack)
                this.filteredData = this.dataTrack;
                this.isLoading = false
            },
            search() {
                if (this.searchText.trim() === "") {
                    this.filteredData = this.dataTrack;
                } else {
                    this.filteredData = this.dataTrack.filter((item) => {
                    return (
                        String(item.ID).toLowerCase().includes(this.searchText.toLowerCase()) ||
                        String(item.ConnoteNo).toLowerCase().includes(this.searchText.toLowerCase()) ||
                        String(item.CreateTime).toLowerCase().includes(this.searchText.toLowerCase()) ||
                        String(item.ConnoteCustName).toLowerCase().includes(this.searchText.toLowerCase()) ||
                        String(item.ConnoteRecvName).toLowerCase().includes(this.searchText.toLowerCase()) ||
                        String(item.ConnoteContents).toLowerCase().includes(this.searchText.toLowerCase())
                    );
                });
                }
            },
            handleRowClick(item){
                console.debug('data item', item)
                // console.debug('data event', event)
            }
        }
    }
</script>
