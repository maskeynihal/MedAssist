import axios from 'axios'

export const userTableData = () => {
    return axios
        .get('http://172.20.0.18:8080/api/get-doctors',{
               
        })
        .then(response =>{
            console.log(response.data)
            return response.data
        })
        .catch(err =>{
            console.log(err)
        })
}

export default userTableData