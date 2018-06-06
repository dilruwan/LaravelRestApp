import { Component, OnInit } from '@angular/core';
import { NoticeService } from '../notice.service';

@Component({
    selector: 'app-notice-list',
    templateUrl: './notice-list.component.html',
    styleUrls: ['./notice-list.component.css']
})

export class NoticeListComponent implements OnInit {

    constructor(private noticeService: NoticeService) { }

    notices:any[] = [];

    ngOnInit(): void {
        this.noticeService.getNotices().then(response => this.notices = response.data)
    }
}