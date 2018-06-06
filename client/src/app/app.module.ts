import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpModule } from '@angular/http';
import { ReactiveFormsModule } from '@angular/forms';

import { AppComponent } from './app.component';
import { HomeComponent } from './home/home.component';
import { NoticeListComponent } from './notice/notice-list/notice-list.component';
import { NoticeComponent } from './notice/notice/notice.component';

import { AppRoutingModule } from './app-routing.module';
import { NoticeService } from './notice/notice.service';

@NgModule({
    declarations: [
        AppComponent,
        HomeComponent,
        NoticeListComponent,
        NoticeComponent
    ],
    imports: [
        BrowserModule,
        AppRoutingModule,
        HttpModule,
        ReactiveFormsModule
    ],
    providers: [ NoticeService ],
    bootstrap: [ AppComponent ]
})
export class AppModule { }
