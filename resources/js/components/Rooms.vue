<template>
    <div>
        <h2>Available Rooms</h2>
        <div class="row">
            <div class="col-md-4" v-for="room in rooms" :key="room.id">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ room.name }}</h5>
                        <p class="card-text">Type: {{ room.room_type.type }}</p>
                        <p class="card-text">Status: {{ room.status.status }}</p>
                        <button class="btn btn-primary" @click="bookRoom(room.id)">Book Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'Rooms',
  data() {
    return {
      rooms: []
    };
  },
  methods: {
    async getRooms() {
      try {
        const response = await axios.get('/api/rooms');
        this.rooms = response.data;
      } catch (error) {
        console.error('Failed to fetch rooms:', error.response.data);
      }
    }
  }
};
</script>

<style scoped>
.card {
    margin-top: 20px;
}
</style>
