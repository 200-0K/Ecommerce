import axios from 'axios';

export default function(id) {
  return {
    async store() {
      const res = await axios.post(`/api/cart/${id}`);
      return res.status === 200;
    }
  }
}