import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { NoticeService } from '../notice.service';

@Component({
    selector: 'app-notice',
    templateUrl: './notice.component.html',
    styleUrls: ['./notice.component.css']
})
export class NoticeComponent implements OnInit {

    noticeId;
    formdata;

    constructor(private route: ActivatedRoute, private noticeService: NoticeService) { }

    ngOnInit() {
        this.noticeId = this.route.snapshot.paramMap.get('id');

        this.formdata = new FormGroup({
            id: new FormControl("new"),
            title: new FormControl(""),
            description: new FormControl("")
        });

        if (this.noticeId == 'new') {
            return;
        }

        this.noticeService.getNotice(this.noticeId).then(response => {
            let notice = response.data;
            this.formdata = new FormGroup({
                id: new FormControl(notice.id),
                title: new FormControl(notice.title),
                description: new FormControl(notice.description)
            });
            return;
        });
    }

    onClickSubmit(data) {
        this.noticeService.saveNotice(data)
        this.noticeService.saveNotice(data).then(response => {
            // Success redirect to notice list
            console.log('response', response);
        });
        console.log(data);
    }
}