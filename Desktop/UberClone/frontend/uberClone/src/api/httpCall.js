import axios from 'axios'
// We are going to use axios to make our HTTP requests
// this code is used to create a base URL for our API requests.
// That way, we don't have to type the full URL every time we make a request.
// We also set the Authorization header to the token in local storage.
// if the token is not in local storage, the header is not set.
// or if the token is not valid, the header is not set.

export const httpCall = () => {
    let options = {
        baseURL: 'http://127.0.0.1:8000', //process.env.VUE_APP_API_URL,
        headers: {}
    }

    if (localStorage.getItem('token')) {
        options.headers.Authorization = `Bearer ${localStorage.getItem('token')}`
    }

    return axios.create(options)
}


