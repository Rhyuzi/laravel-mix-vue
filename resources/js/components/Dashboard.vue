<template>
    <TambahPickup v-if="popupCreate"></TambahPickup>
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
                    <div>
                        <button @click="popupCreate = true" class="btn btn-primary">Tambah Data</button>
                    </div>
                    <Vue3EasyDataTable :headers="headers" :items="dataPicOrd" />
                </div>
                </div>
</template>

<script>
// import { DataTable } from "@jobinsjp/vue3-datatable"
import { mapGetters } from 'vuex'
import SideBar from './SideBar.vue';
import Vue3EasyDataTable from 'vue3-easy-data-table'
import { get_data_city, get_data_pickup, get_data_service } from '../api/api_helpers'
import 'vue3-easy-data-table/dist/style.css';
import TambahPickup from './PopupTambahPickup.vue';

    export default {
        components: {
            SideBar,
            // DataTable
            Vue3EasyDataTable,
            TambahPickup
        },
        data() {
            return {
                popupCreate: false,
                // dataPicOrd: [],
                dataCity: [],
                dataService: [],
                pagination: null,
                headers: [
                    { text: "ID", value: "POrderNo" },
                    { text: "TGL.ORDER", value: "POrderDate"},
                    { text: "PENGIRIM", value: "POrderCustName"},
                    { text: "PENERIMA", value: "POrderRecvName"},
                    { text: "ISI BARANG", value: "POrderIsi"},
                    // { text: "WEIGHT (lbs)", value: "indicator.weight", sortable: true},
                    // { text: "LAST ATTENDED", value: "lastAttended", width: 200},
                    // { text: "COUNTRY", value: "country"},
                ],
                items: [
                    { player: "Stephen Curry", team: "GSW", number: 30, position: 'G', indicator: {"height": '6-2', "weight": 185}, lastAttended: "Davidson", country: "USA"},
                    { player: "Lebron James", team: "LAL", number: 6, position: 'F', indicator: {"height": '6-9', "weight": 250}, lastAttended: "St. Vincent-St. Mary HS (OH)", country: "USA"},
                    { player: "Kevin Durant", team: "BKN", number: 7, position: 'F', indicator: {"height": '6-10', "weight": 240}, lastAttended: "Texas-Austin", country: "USA"},
                    { player: "Giannis Antetokounmpo", team: "MIL", number: 34, position: 'F', indicator: {"height": '6-11', "weight": 242}, lastAttended: "Filathlitikos", country: "Greece"},

                ],
                data: []
            }
        },
        computed: {
            ...mapGetters({
                dataPicOrd: 'pickup/getDataPickups',
            }),
        },
        async mounted() {
            await this.getDataPickup()
            await this.getDataCity()
            await this.getDataService()
        },
        methods: {
            async getDataPickup() {
                await this.$store.dispatch('pickup/getDataPickup')
                console.debug('ie yeh',this.dataPicOrd)
        },
            async getDataCity() {
                const result = await get_data_city('city')

                this.dataCity = result.data
            },
            async getDataService() {
                const result = await get_data_service('service')

                this.dataService = result.data
            }
        }
    }
</script>
