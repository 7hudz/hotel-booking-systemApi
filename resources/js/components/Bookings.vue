<template>
  <div class="bookings-container">
    <!-- Display error message if there's an error -->
    <div v-if="error" class="alert alert-danger">
      {{ error }}
    </div>
    <h2>Your Bookings</h2>
    <!-- Display bookings data if available -->
    <div v-if="bookings.length === 0">
      <p>No bookings available.</p>
    </div>
    <div v-else>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Room</th>
            <th>Status</th>
            <th>booked_at</th>
            <th>Actions</th>
            
          </tr>
        </thead>
        <tbody>
          <!-- Loop through bookings and display them in table rows -->
          <tr v-for="booking in bookings" :key="booking.id">
            <td>{{ booking.room }}</td>
            <td>{{ booking.status }}</td>
            <td>{{booking.booked_at}}</td>
            <td>
              <button
                class="btn btn-danger"
                @click="cancelBooking(booking.id)"
              >
                Cancel
              </button>
            </td>
          </tr>
          
          
          
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'Bookings',
  data() {
    return {
      bookings: [],
      error: '', // Hold error messages
    };
  },
  created() {
    this.fetchBookings();
  },
  methods: {
    fetchBookings() {
      axios
        .get('/api/bookings', {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('token')}`, // Ensure token is set
          },
        })
        .then((response) => {
          this.bookings = response.data; // Update bookings data on successful fetch
        })
        .catch((error) => {
          this.error = 'Failed to fetch bookings.'; // Handle error
        });
    },
    cancelBooking(id) {
      axios
        .delete(`/api/bookings/${id}`, {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('token')}`, // Ensure token is set
          },
        })
        .then(() => {
          // Remove cancelled booking from local data
          this.bookings = this.bookings.filter((booking) => booking.id !== id);
        })
        .catch((error) => {
          this.error = 'Failed to cancel booking.'; // Handle error
        });
    },
  },
};
</script>

  
  <style scoped>
  .bookings-container {
    margin-top: 20px;
  }
  .table {
    margin-top: 20px;
  }
  </style>
  