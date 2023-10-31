<template>
    <Loading v-if="isLoading"></Loading>
    <div class="data-resi">
        <table>
            <tr>
                <td><h1>No.Resi</h1></td>
                <td><h1>:</h1></td>
                <td><h1>{{ resi.ConnoteNo }}</h1></td>
            </tr>
            <tr>
                <td><h1>Tanggal</h1></td>
                <td><h1>:</h1></td>
                <td><h1>{{ resi.CreateTime }}</h1></td>
            </tr>
            <tr>
                <td><h1>No DO/SJ</h1></td>
                <td><h1>:</h1></td>
                <td><h1>{{ resi.ConnoteNo }}</h1></td>
            </tr>
            <tr>
                <td><h1>Nama Dituju</h1></td>
                <td><h1>:</h1></td>
                <td><h1>{{ resi.ConnoteRecvName }}</h1></td>
            </tr>
            <tr>
                <td><h1>Alamat Dituju</h1></td>
                <td><h1>:</h1></td>
                <td><h1>{{ resi.ConnoteRecvAddr }}</h1></td>
            </tr>
            <tr>
                <td><h1>Kota</h1></td>
                <td><h1>:</h1></td>
                <td><h1>{{ resi.ConnoteCustAddr }}</h1></td>
            </tr>
            <tr>
                <td><h1>Isi</h1></td>
                <td><h1>:</h1></td>
                <td><h1>{{ resi.ConnoteContents }}</h1></td>
            </tr>
            <tr>
                <td><h1>Berat/Jumlah</h1></td>
                <td><h1>:</h1></td>
                <td><h1>{{ resi.ConnoteWeight }}/{{ resi.ConnoteQty }}</h1></td>
            </tr>
        </table>
    </div>


        <div>
            <table class="resi">
        <thead>
            <tr>
                <th class="res-head">No</th>
                <th class="res-head">Waktu</th>
                <th class="res-head">Lokasi</th>
                <th class="res-head">Status</th>
                <th class="res-head">Deskripsi</th>
                <th class="res-head">Operator</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in procRes" :key="item.ID">
                <td class="res-data">{{ item.ID }}</td>
                <td class="res-data">{{ item.CPCreateTime }}</td>
                <td class="res-data">{{ item.CPLocation }}</td>
                <td class="res-data">{{ item.StatusPOD.StatusPODName }}</td>
                <td class="res-data">{{ item.CPMemo }}</td>
                <td class="res-data">{{ item.CPCreateBy }}</td>
            </tr>
        </tbody>
    </table>
        </div>
</template>

<script>
// import { DataTable } from "@jobinsjp/vue3-datatable"
import { mapGetters } from 'vuex'
import Vue3EasyDataTable from 'vue3-easy-data-table'
import { get_data_city, getCoverageArea, get_data_service, getTrackingById } from '../api/api_helpers'
import 'vue3-easy-data-table/dist/style.css';
import Loading from './Loading.vue';

    export default {
        components: {
            Loading,
            Vue3EasyDataTable,
        },
        data() {
            return {
                resi: {},
                procRes: []
            }
        },
        computed: {
            ...mapGetters({
                dataResi: 'tracking/getResi',
            }),
        },
        async mounted() {
            this.resi = JSON.parse(localStorage.resi)
            await this.getResi()
        },
        methods: {
            async getResi(){
                const res = await this.$store.dispatch('tracking/getDataResiById', {resi: this.resi.ConnoteNo})

                this.procRes = res.data.data
                console.debug('data Resi',res)
            }
        }
    }
</script>

<style>
.data-resi {
    margin: 42px 0px 45px 86px;
}
h1{
    font-size: 20px;
}
 .resi {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        .res-head, .res-data {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        .res-head {
            background-color: #f2f2f2;
        }

        .res-data:nth-child(even) {
            background-color: #f2f2f2;
        }

</style>
