<template>
    <div>
        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>กลุ่มระดับชั้น</h3>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><a href="#" class="btn btn-sm btn-success btn-sm"><i class="fas fa-plus"></i> เพิ่ม</a></li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="card-block">
                            <div class="row">
                                <div class="col-12">
                                    <b-table responsive :items="items"></b-table>
                                        <!-- <table class="table table-bordered table-inverse table-border-style table-striped text-center dtAll" id="dtTable">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-center">Group Code</th>
                                                    <th class="text-center">Group Name</th>
                                                    <th class="text-center">แก้ไข</th>
                                                    <th class="text-center">ลบ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(item, index) in getall" :key="index">
                                                    <td>{{ index+1 }}</td>
                                                    <td>{{ item.code }}</td>
                                                    <td>{{ item.name }}</td>
                                                    <td><button type="button" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button></td>
                                                    <td><button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button></td>
                                                </tr>  
                                                    
                                            
                                            </tbody>
                                        </table> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        axios.get("/api/grade_group_all").then( data => {
            this.getall = data.data;
        });
        console.log(this.getall);
        
    },
    data() {
        return {
            getall: {},
            items: [
                { age: 40, first_name: 'Dickerson', last_name: 'Macdonald' },
                { age: 21, first_name: 'Larsen', last_name: 'Shaw' },
                { age: 89, first_name: 'Geneva', last_name: 'Wilson' },
                { age: 38, first_name: 'Jami', last_name: 'Carney' }
            ]
        }
    },
}
</script>