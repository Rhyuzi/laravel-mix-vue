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
        <div>
            <button @click="popupCreate = true" class="btn btn-primary">Tambah Data</button>
        </div>
        <Vue3EasyDataTable :headers="headers" :items="dataPicOrd" />
            </div>
    </div>
    </div>
</template>

<script>
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
                popupCreate: false,
                isLoading: false,
                dataCity: [],
                dataService: [],
                pagination: null,
                headers: [
                    { text: "ID", value: "POrderNo" },
                    { text: "TGL.ORDER", value: "POrderDate"},
                    { text: "PENGIRIM", value: "POrderCustName"},
                    { text: "PENERIMA", value: "POrderRecvName"},
                    { text: "ISI BARANG", value: "POrderIsi"},
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
            // await getCoverageArea()
            // await getTrackingById()
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
