import { Injectable } from '@angular/core';
import { Headers, Http, RequestOptions } from '@angular/http';

import 'rxjs/add/operator/toPromise';

@Injectable()
export class NoticeService {
    // TODO: this should goto config file
    private apiUrl = 'http://localhost:8000/api';

    constructor(private http: Http) { }

    /**
     * Get notice list
     */
    getNotices(): Promise<any> {
        let url = this.apiUrl + '/notices';
        return this.http.get(url)
            .toPromise()
            .then(this.handleData)
            .catch(this.handleError)
    }

    /**
     * Get notice
     */
    getNotice(id:number): Promise<any> {
        return this.http.get(this.apiUrl + '/notices/' + id)
            .toPromise()
            .then(this.handleData)
            .catch(this.handleError)
    }

    /**
     * Save notice
     * Both create & update notice has been handled
     */
    saveNotice(data:any): Promise<any> {
        if (!data) {
            return;
        }

        if (data.id == 'new') { // Create Notice
            console.log('SSS', data);
            let req = {
                method: 'POST',
                url: this.apiUrl + '/notices',
                headers: {
                    'Content-Type': 'application/json',
                    'Access-Control-Allow-Origin': '*'
                },
                data: JSON.stringify(data)
            }

            let headers = new Headers({ 'Content-Type': 'application/json' });
            let options = new RequestOptions({ headers: headers });
            return this.http.post(this.apiUrl + '/notices', data, options)
                .toPromise()
                .then(this.handleData)
                .catch(this.handleError)
        }

        console.log('TTTT', data);

        // Update notice
        return this.http.put(this.apiUrl + '/notices/' + data.id, data)
            .toPromise()
            .then(this.handleData)
            .catch(this.handleError)
    }

    private handleData(res: any) {
        let response = res.json();
        return response || {};
    }

    private handleError(error: any): Promise<any> {
        console.error('Error!', error);
        return Promise.reject(error.message || error);
    }
}