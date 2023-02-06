<template>
  <h1>Helló, Vite és Vue meg Laravel!</h1>
    <Menu></Menu>
    <Table></Table>
</template>
<script>
import Menu from "./components/menu";
import Table from "./components/table";
export default {
    components: {Table, Menu}
}
</script>
