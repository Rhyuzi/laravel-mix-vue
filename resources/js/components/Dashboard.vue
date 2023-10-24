<template>
    <SideBar></SideBar>
    <div class="x_panel">
                  <div class="x_title">
                    <h2>Default Example <small>Users</small></h2>
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

                    <Vue3EasyDataTable :headers="headers" :items="dataPicOrd" />
                </div>
                </div>
</template>

<script>
// import { DataTable } from "@jobinsjp/vue3-datatable"
import SideBar from './SideBar.vue';
import Vue3EasyDataTable from 'vue3-easy-data-table'
import { get_data_pickup } from '../api/api_helpers'
import 'vue3-easy-data-table/dist/style.css';

    export default {
        components: {
            SideBar,
            // DataTable
            Vue3EasyDataTable
        },
        data() {
            return {
                dataPicOrd: [],
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
        async mounted() {
            await this.getDataPickup()
        },
        methods: {
            async getDataPickup() {
                const pickup = await get_data_pickup('pickup-order')

                this.dataPicOrd = pickup.data
                console.error(pickup)
            }
        }
    }
</script>
