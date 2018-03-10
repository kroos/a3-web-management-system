USE [ASD]
GO
/****** Object:  User [a3serial]    Script Date: 03/11/2018 01:05:16 ******/
CREATE USER [a3serial] FOR LOGIN [a3serial] WITH DEFAULT_SCHEMA=[a3serial]
GO
/****** Object:  Schema [a3serial]    Script Date: 03/11/2018 01:05:16 ******/
CREATE SCHEMA [a3serial] AUTHORIZATION [a3serial]
GO
/****** Object:  Table [dbo].[ZipCode]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [ZipCode](
	[zipidx] [int] NOT NULL,
	[zipcode] [char](7) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[sido] [varchar](8) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[gugun] [varchar](11) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[dong] [varchar](41) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[note1] [varchar](26) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[note2] [varchar](18) COLLATE SQL_Latin1_General_CP1_CI_AS NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[WebLoginReport]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [WebLoginReport](
	[LoginYear] [smallint] NOT NULL,
	[LoginMonth] [tinyint] NOT NULL,
	[LoginDay] [tinyint] NOT NULL,
	[LoginHour] [tinyint] NOT NULL,
	[CntSuccess] [int] NOT NULL,
	[CntFailure] [int] NOT NULL,
	[CntAccessDeny] [int] NOT NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[WebLoginRecentLog]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [WebLoginRecentLog](
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[LoginIP] [char](15) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[CntLoginFailure] [int] NOT NULL,
	[CheckDate] [smalldatetime] NOT NULL,
	[AccessDenyDate] [smalldatetime] NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[WebLoginLog]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [WebLoginLog](
	[WebLoginLogID] [int] NOT NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[LoginIP] [char](15) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[LoginDate] [smalldatetime] NOT NULL,
	[LoginSuccess] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[AccessDeny] [bit] NOT NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[UserTicket]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [UserTicket](
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[TicketNo] [char](12) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[UpdateLog]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [UpdateLog](
	[UpdateLogID] [int] NOT NULL,
	[ManageID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[UpdateContent] [varchar](3000) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[LogDate] [smalldatetime] NOT NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[RandChar]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [RandChar](
	[RandNo] [int] NOT NULL,
	[Rand] [int] NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[QuestResponse]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [QuestResponse](
	[QuestNo] [tinyint] NOT NULL,
	[AnswerNo] [tinyint] NOT NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[QuestList]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [QuestList](
	[QuestNo] [tinyint] NOT NULL,
	[Content] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[QuestFlag] [bit] NOT NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[PcbangList]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [PcbangList](
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[PcbangCode] [varchar](12) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[PcbangName] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Owner] [varchar](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[SCN] [char](14) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[PcbangAddress] [varchar](255) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[PcbangZipcode] [char](7) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[OwnerAddress] [varchar](255) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[OwnerZipcode] [char](7) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[PcbangTel] [char](14) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Uptae] [varchar](100) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[OpenDate] [varchar](10) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Upzong] [varchar](100) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Semuser] [varchar](30) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[RequestDate] [smalldatetime] NOT NULL,
	[Result] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[ResultDate] [smalldatetime] NULL,
	[ResultDesc] [varchar](1000) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[ResultUser] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[ResultNo] [int] NOT NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[OutAccount]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [OutAccount](
	[OutAccountID] [int] NOT NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[OutDate] [smalldatetime] NOT NULL,
	[Result] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[ResultUser] [varchar](20) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[ResultDesc] [varchar](4000) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[Reason] [varchar](1000) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[RestoreDate] [smalldatetime] NULL,
	[SCN] [varchar](14) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[PrevStatus] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[ResultDate] [smalldatetime] NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Temp_Account]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [Temp_Account](
	[username] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NULL,
	[password] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NULL,
	[email] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NULL,
	[passkey] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NULL,
	[date] [smalldatetime] NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[StatusLog]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [StatusLog](
	[StatusLogID] [int] NOT NULL,
	[ManageID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Status] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[StartDate] [smalldatetime] NOT NULL,
	[EndDate] [smalldatetime] NOT NULL,
	[Content] [varchar](1000) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[LogDate] [smalldatetime] NOT NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[SerialList]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [SerialList](
	[SerialNo] [char](20) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[ItemInfo] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Parameter1] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Parameter2] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Type] [char](1) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[UsedFlag] [char](1) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[ExpireDate] [datetime] NOT NULL,
 CONSTRAINT [PK_SerialList] PRIMARY KEY CLUSTERED 
(
	[SerialNo] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[RestoreRequest]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [RestoreRequest](
	[RestoreRequestID] [int] NOT NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[SCN] [char](14) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Result] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[RequestDate] [smalldatetime] NOT NULL,
	[ResultDate] [smalldatetime] NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ReservedPresent]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [ReservedPresent](
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[SeatName] [varchar](49) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[PresentType] [varchar](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Present] [varchar](100) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ReservedChar]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [ReservedChar](
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[CharName] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[ServerIdx] [tinyint] NOT NULL,
	[CharClass] [tinyint] NOT NULL,
	[Nation] [tinyint] NOT NULL,
	[GroupSeatID] [int] NULL,
	[RegistDate] [smalldatetime] NOT NULL,
	[Sex] [tinyint] NOT NULL,
	[Name] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Clan]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [Clan](
	[ClanID] [char](2) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[ServerID] [char](1) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[ClanName] [varchar](10) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Nation] [varchar](10) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[MarkID] [varchar](10) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[CDate] [smalldatetime] NULL,
	[DDate] [smalldatetime] NULL,
	[ClanPasswd] [varchar](10) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[ClanRank] [varchar](10) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[ClanStatus] [char](1) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[StorageID] [varchar](10) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[AgitID] [varchar](10) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[WinCount] [int] NOT NULL,
	[LoseCount] [int] NOT NULL,
 CONSTRAINT [PK_Clan] PRIMARY KEY CLUSTERED 
(
	[ClanID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[CharInfo]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [CharInfo](
	[AccountID] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[ServerIdx] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[CharName] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Type] [char](1) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Nation] [char](1) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[None] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Charac0]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [Charac0](
	[c_id] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_sheadera] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_sheaderb] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_sheaderc] [int] NOT NULL,
	[c_headera] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_headerb] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_headerc] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[d_cdate] [smalldatetime] NULL,
	[d_udate] [smalldatetime] NULL,
	[c_status] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[m_body] [varchar](4000) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[rb] [int] NOT NULL,
	[times_rb] [int] NOT NULL,
 CONSTRAINT [PK_Charac0] PRIMARY KEY CLUSTERED 
(
	[c_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Captcha]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [Captcha](
	[captcha_id] [bigint] IDENTITY(1,1) NOT NULL,
	[captcha_time] [int] NULL,
	[ip_address] [varchar](50) COLLATE Latin1_General_CI_AS NULL,
	[word] [varchar](50) COLLATE Latin1_General_CI_AS NULL,
 CONSTRAINT [PK_Captcha] PRIMARY KEY CLUSTERED 
(
	[captcha_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[BlackList]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [BlackList](
	[BlackListID] [int] NOT NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[BlockStartDate] [smalldatetime] NOT NULL,
	[BlockEndDate] [smalldatetime] NOT NULL,
	[AccountStatus] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Status] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Content] [varchar](1000) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Ban_IP]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [Ban_IP](
	[List_IP] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[AuthLog]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [AuthLog](
	[AuthLogID] [int] NOT NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[AuthType] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[AuthDate] [smalldatetime] NOT NULL,
	[Result] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Answer]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [Answer](
	[QuestNo] [tinyint] NOT NULL,
	[AnswerNo] [tinyint] NOT NULL,
	[Content] [varchar](100) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[AdultCheck]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [AdultCheck](
	[Name] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[SCN] [char](13) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[RegDate] [smalldatetime] NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[AccountFailAuth]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [AccountFailAuth](
	[FailAuthID] [int] NOT NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[SCN1] [char](15) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[SCN2] [char](15) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[AuthDate] [smalldatetime] NOT NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[AccountExt]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [AccountExt](
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Job] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[RecomID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[EmailStatus] [bit] NOT NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[AccountAuth]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [AccountAuth](
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[AuthType] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[AuthDate] [smalldatetime] NOT NULL,
	[Result] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Account]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [Account](
	[c_id] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_sheadera] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_sheaderb] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_sheaderc] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_headera] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_headerb] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_headerc] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[d_cdate] [smalldatetime] NULL,
	[d_udate] [smalldatetime] NULL,
	[c_status] [char](10) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[m_body] [varchar](4000) COLLATE SQL_Latin1_General_CP1251_CS_AS NULL,
	[acc_status] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NULL,
	[salary] [smalldatetime] NULL,
	[last_salary] [smalldatetime] NULL,
 CONSTRAINT [PK_Account_unique] PRIMARY KEY CLUSTERED 
(
	[c_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[FaultMailAccount]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [FaultMailAccount](
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[DenyChar]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [DenyChar](
	[DenyCharID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[GroupSeat]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [GroupSeat](
	[GroupSeatID] [int] NOT NULL,
	[Master] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[SeatName] [varchar](40) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[SeatType] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[SeatPassword] [varchar](15) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[ServerIdx] [tinyint] NOT NULL,
	[CntRegist] [tinyint] NOT NULL,
	[Name] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  UserDefinedFunction [dbo].[GetAccountName]    Script Date: 03/11/2018 01:05:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE  FUNCTION [GetAccountName](@CharacterName char(20))
RETURNS char(20) AS  
BEGIN   
   DECLARE @AccountName char(20)
   select @AccountName = c_sheadera
   from ASD.dbo.Character
   where c_id=@CharacterName

   RETURN @AccountName
END
GO
/****** Object:  Table [dbo].[GameServerMessage]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [GameServerMessage](
	[AccountID] [ntext] COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[StatusID] [ntext] COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[mbody] [ntext] COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[Message] [ntext] COLLATE SQL_Latin1_General_CP1_CI_AS NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[GameServer]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [GameServer](
	[ServerIdx] [tinyint] NOT NULL,
	[ServerName] [char](16) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[CntRegist] [int] NOT NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[GameLoginLog]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [GameLoginLog](
	[LoginIdx] [int] NOT NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[LoginIP] [varchar](15) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[LoginDate] [smalldatetime] NOT NULL,
	[PayMode] [char](3) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[GameBroadcast]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [GameBroadcast](
	[GameBroadcastID] [int] NOT NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[RequestDate] [smalldatetime] NOT NULL,
	[Job] [varchar](200) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Motive] [varchar](2000) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Intro] [varchar](2000) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[FilePath] [varchar](200) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[InnerAccount]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [InnerAccount](
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Desc] [varchar](500) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[CreateDate] [smalldatetime] NOT NULL,
	[Creater] [char](8) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Job]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [Job](
	[JobID] [int] IDENTITY(1,1) NOT NULL,
	[JobName] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AI NOT NULL,
 CONSTRAINT [PK_Job] PRIMARY KEY CLUSTERED 
(
	[JobID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LottoEvent]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [LottoEvent](
	[LottoEventID] [smallint] NOT NULL,
	[EventName] [varchar](30) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LottoEvent] PRIMARY KEY CLUSTERED 
(
	[LottoEventID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Lotto]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [Lotto](
	[LottoEventID] [smallint] NOT NULL,
	[AccountID] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SelectNum1] [tinyint] NOT NULL,
	[SelectNum2] [tinyint] NOT NULL,
	[SelectNum3] [tinyint] NOT NULL,
	[SelectNum4] [tinyint] NOT NULL,
	[SelectNum5] [tinyint] NOT NULL,
 CONSTRAINT [PK_Lotto] PRIMARY KEY CLUSTERED 
(
	[LottoEventID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LotteryTicket]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [LotteryTicket](
	[LotteryTicketID] [bigint] NOT NULL,
	[IsUsed] [varchar](1) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[TicketNo] [varchar](12) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LotteryTicket] PRIMARY KEY CLUSTERED 
(
	[LotteryTicketID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LoginLog]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [LoginLog](
	[SCN] [char](13) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[LoginDate] [datetime] NOT NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB9]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [LETTERDB9](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB9] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB8]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [LETTERDB8](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB8] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB7]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [LETTERDB7](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB7] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB6]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [LETTERDB6](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB6] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB5]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [LETTERDB5](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB5] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB4]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [LETTERDB4](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB4] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB3]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [LETTERDB3](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB3] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB2]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [LETTERDB2](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB2] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB15]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [LETTERDB15](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB15] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB14]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [LETTERDB14](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB14] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB13]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [LETTERDB13](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB13] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB12]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [LETTERDB12](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB12] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB11]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [LETTERDB11](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB11] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB10]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [LETTERDB10](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB10] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB1]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [LETTERDB1](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB1] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LETTERDB0]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [LETTERDB0](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB0] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ItemStorage0]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [ItemStorage0](
	[c_id] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_sheadera] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_sheaderb] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_sheaderc] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_headera] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_headerb] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[c_headerc] [varchar](255) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[d_cdate] [datetime] NULL,
	[d_udate] [datetime] NULL,
	[c_status] [char](1) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[m_body] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_ItemStorage] PRIMARY KEY CLUSTERED 
(
	[c_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[HSSTONETABLE]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [HSSTONETABLE](
	[MasterName] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[CreateDate] [smalldatetime] NULL,
	[SaveDate] [smalldatetime] NULL,
	[Slot0] [varchar](256) COLLATE SQL_Latin1_General_CP1251_CS_AS NULL,
	[Slot1] [varchar](256) COLLATE SQL_Latin1_General_CP1251_CS_AS NULL,
	[Slot2] [varchar](256) COLLATE SQL_Latin1_General_CP1251_CS_AS NULL,
	[Slot3] [varchar](256) COLLATE SQL_Latin1_General_CP1251_CS_AS NULL,
 CONSTRAINT [PK_Hsstonetable] PRIMARY KEY CLUSTERED 
(
	[MasterName] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[FRIEND0]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [FRIEND0](
	[CharName] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[GroupInfo] [varchar](1024) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[FriendInfo] [varchar](1024) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_FRIEND0] PRIMARY KEY CLUSTERED 
(
	[CharName] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ClanInfo]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [ClanInfo](
	[ClanID] [int] NOT NULL,
	[ServerID] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[ClanName] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Nation] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[MasterName] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[MarkID] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[CDate] [smalldatetime] NULL,
	[DDate] [smalldatetime] NULL,
	[ClanPasswd] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[ClanRank] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[ClanStatus] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[StorageID] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[AgitID] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[WinCount] [int] NOT NULL,
	[LoseCount] [int] NOT NULL,
 CONSTRAINT [PK_ClanInfo] PRIMARY KEY CLUSTERED 
(
	[ClanID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[A3Web_HTML]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [A3Web_HTML](
	[Bil] [int] IDENTITY(1,1) NOT NULL,
	[Author] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NULL,
	[Category] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NULL,
	[Subject] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NULL,
	[HTML] [varchar](4000) COLLATE SQL_Latin1_General_CP1251_CS_AS NULL,
	[Date] [smalldatetime] NULL,
 CONSTRAINT [PK_A3Web_HTML] PRIMARY KEY CLUSTERED 
(
	[Bil] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Trigger [tr_charac0]    Script Date: 03/11/2018 01:05:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TRIGGER [tr_charac0]
   ON  [Charac0]
   AFTER INSERT
AS 

IF EXISTS (SELECT c_id FROM inserted WHERE (c_id LIKE '%ƒ%') OR (c_id LIKE '%„%') OR (c_id LIKE '%…%') OR (c_id LIKE '%†%') OR (c_id LIKE '%‡%') OR (c_id LIKE '%ˆ%') OR (c_id LIKE '%‰%') OR (c_id LIKE '%Š%') OR (c_id LIKE '%‹%') OR (c_id LIKE '%Œ%') OR (c_id LIKE '%%') OR (c_id LIKE '%Ž%') OR (c_id LIKE '%%') OR (c_id LIKE '%%') OR (c_id LIKE '%‘%') OR (c_id LIKE '%’%') OR (c_id LIKE '%“%') OR (c_id LIKE '%”%') OR (c_id LIKE '%•%') OR (c_id LIKE '%–%') OR (c_id LIKE '%—%') OR (c_id LIKE '%˜%') OR (c_id LIKE '%™%') OR (c_id LIKE '%š%') OR (c_id LIKE '%›%') OR (c_id LIKE '%œ%') OR (c_id LIKE '%%') OR (c_id LIKE '%ž%') OR (c_id LIKE '%Ÿ%') OR (c_id LIKE '% %') OR (c_id LIKE '%¡%') OR (c_id LIKE '%¢%') OR (c_id LIKE '%£%') OR (c_id LIKE '%¤%') OR (c_id LIKE '%¥%') OR (c_id LIKE '%¦%') OR (c_id LIKE '%§%') OR (c_id LIKE '%¨%') OR (c_id LIKE '%©%') OR (c_id LIKE '%ª%') OR (c_id LIKE '%«%') OR (c_id LIKE '%¬%') OR (c_id LIKE '%­%') OR (c_id LIKE '%®%') OR (c_id LIKE '%¯%') OR (c_id LIKE '%°%') OR (c_id LIKE '%±%') OR (c_id LIKE '%²%') OR (c_id LIKE '%³%') OR (c_id LIKE '%´%') OR (c_id LIKE '%µ%') OR (c_id LIKE '%¶%') OR (c_id LIKE '%·%') OR (c_id LIKE '%¸%') OR (c_id LIKE '%¹%') OR (c_id LIKE '%º%') OR (c_id LIKE '%»%') OR (c_id LIKE '%ü%') OR (c_id LIKE '%½%') OR (c_id LIKE '%¾%') OR (c_id LIKE '%¿%') OR (c_id LIKE '%À%') OR (c_id LIKE '%Á%') OR (c_id LIKE '%Â%') OR (c_id LIKE '%Ã%') OR (c_id LIKE '%Ä%') OR (c_id LIKE '%Å%') OR (c_id LIKE '%Æ%') OR (c_id LIKE '%Ç%') OR (c_id LIKE '%È%') OR (c_id LIKE '%É%') OR (c_id LIKE '%Ê%') OR (c_id LIKE '%Ë%') OR (c_id LIKE '%Ì%') OR (c_id LIKE '%Í%') OR (c_id LIKE '%Î%') OR (c_id LIKE '%Ï%') OR (c_id LIKE '%Ð%') OR (c_id LIKE '%Ñ%') OR (c_id LIKE '%Ò%') OR (c_id LIKE '%Ó%') OR (c_id LIKE '%Ô%') OR (c_id LIKE '%Õ%') OR (c_id LIKE '%Ö%') OR (c_id LIKE '%×%') OR (c_id LIKE '%Ø%') OR (c_id LIKE '%Ù%') OR (c_id LIKE '%Ú%') OR (c_id LIKE '%Û%') OR (c_id LIKE '%Ü%') OR (c_id LIKE '%Ý%') OR (c_id LIKE '%Þ%') OR (c_id LIKE '%ß%') OR (c_id LIKE '%à%') OR (c_id LIKE '%á%') OR (c_id LIKE '%â%') OR (c_id LIKE '%ã%') OR (c_id LIKE '%ä%') OR (c_id LIKE '%å%') OR (c_id LIKE '%æ%') OR (c_id LIKE '%ç%') OR (c_id LIKE '%è%') OR (c_id LIKE '%é%') OR (c_id LIKE '%ê%') OR (c_id LIKE '%ë%') OR (c_id LIKE '%ì%') OR (c_id LIKE '%í%') OR (c_id LIKE '%î%') OR (c_id LIKE '%ï%') OR (c_id LIKE '%ð%') OR (c_id LIKE '%ñ%') OR (c_id LIKE '%ò%') OR (c_id LIKE '%ó%') OR (c_id LIKE '%ô%') OR (c_id LIKE '%õ%') OR (c_id LIKE '%ö%') OR (c_id LIKE '%÷%') OR (c_id LIKE '%ø%') OR (c_id LIKE '%ù%') OR (c_id LIKE '%ú%') OR (c_id LIKE '%û%') OR (c_id LIKE '%ü%') OR (c_id LIKE '%ý%') OR (c_id LIKE '%þ%') OR (c_id LIKE '%ÿ%'))

BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

    -- Insert statements for trigger here

--	UPDATE charac0
--	Set c_status = 'X'
--	WHERE (c_id LIKE '%ƒ%') OR (c_id LIKE '%„%') OR (c_id LIKE '%…%') OR (c_id LIKE '%†%') OR (c_id LIKE '%‡%') OR (c_id LIKE '%ˆ%') OR (c_id LIKE '%‰%') OR (c_id LIKE '%Š%') OR (c_id LIKE '%‹%') OR (c_id LIKE '%Œ%') OR (c_id LIKE '%%') OR (c_id LIKE '%Ž%') OR (c_id LIKE '%%') OR (c_id LIKE '%%') OR (c_id LIKE '%‘%') OR (c_id LIKE '%’%') OR (c_id LIKE '%“%') OR (c_id LIKE '%”%') OR (c_id LIKE '%•%') OR (c_id LIKE '%–%') OR (c_id LIKE '%—%') OR (c_id LIKE '%˜%') OR (c_id LIKE '%™%') OR (c_id LIKE '%š%') OR (c_id LIKE '%›%') OR (c_id LIKE '%œ%') OR (c_id LIKE '%%') OR (c_id LIKE '%ž%') OR (c_id LIKE '%Ÿ%') OR (c_id LIKE '% %') OR (c_id LIKE '%¡%') OR (c_id LIKE '%¢%') OR (c_id LIKE '%£%') OR (c_id LIKE '%¤%') OR (c_id LIKE '%¥%') OR (c_id LIKE '%¦%') OR (c_id LIKE '%§%') OR (c_id LIKE '%¨%') OR (c_id LIKE '%©%') OR (c_id LIKE '%ª%') OR (c_id LIKE '%«%') OR (c_id LIKE '%¬%') OR (c_id LIKE '%­%') OR (c_id LIKE '%®%') OR (c_id LIKE '%¯%') OR (c_id LIKE '%°%') OR (c_id LIKE '%±%') OR (c_id LIKE '%²%') OR (c_id LIKE '%³%') OR (c_id LIKE '%´%') OR (c_id LIKE '%µ%') OR (c_id LIKE '%¶%') OR (c_id LIKE '%·%') OR (c_id LIKE '%¸%') OR (c_id LIKE '%¹%') OR (c_id LIKE '%º%') OR (c_id LIKE '%»%') OR (c_id LIKE '%ü%') OR (c_id LIKE '%½%') OR (c_id LIKE '%¾%') OR (c_id LIKE '%¿%') OR (c_id LIKE '%À%') OR (c_id LIKE '%Á%') OR (c_id LIKE '%Â%') OR (c_id LIKE '%Ã%') OR (c_id LIKE '%Ä%') OR (c_id LIKE '%Å%') OR (c_id LIKE '%Æ%') OR (c_id LIKE '%Ç%') OR (c_id LIKE '%È%') OR (c_id LIKE '%É%') OR (c_id LIKE '%Ê%') OR (c_id LIKE '%Ë%') OR (c_id LIKE '%Ì%') OR (c_id LIKE '%Í%') OR (c_id LIKE '%Î%') OR (c_id LIKE '%Ï%') OR (c_id LIKE '%Ð%') OR (c_id LIKE '%Ñ%') OR (c_id LIKE '%Ò%') OR (c_id LIKE '%Ó%') OR (c_id LIKE '%Ô%') OR (c_id LIKE '%Õ%') OR (c_id LIKE '%Ö%') OR (c_id LIKE '%×%') OR (c_id LIKE '%Ø%') OR (c_id LIKE '%Ù%') OR (c_id LIKE '%Ú%') OR (c_id LIKE '%Û%') OR (c_id LIKE '%Ü%') OR (c_id LIKE '%Ý%') OR (c_id LIKE '%Þ%') OR (c_id LIKE '%ß%') OR (c_id LIKE '%à%') OR (c_id LIKE '%á%') OR (c_id LIKE '%â%') OR (c_id LIKE '%ã%') OR (c_id LIKE '%ä%') OR (c_id LIKE '%å%') OR (c_id LIKE '%æ%') OR (c_id LIKE '%ç%') OR (c_id LIKE '%è%') OR (c_id LIKE '%é%') OR (c_id LIKE '%ê%') OR (c_id LIKE '%ë%') OR (c_id LIKE '%ì%') OR (c_id LIKE '%í%') OR (c_id LIKE '%î%') OR (c_id LIKE '%ï%') OR (c_id LIKE '%ð%') OR (c_id LIKE '%ñ%') OR (c_id LIKE '%ò%') OR (c_id LIKE '%ó%') OR (c_id LIKE '%ô%') OR (c_id LIKE '%õ%') OR (c_id LIKE '%ö%') OR (c_id LIKE '%÷%') OR (c_id LIKE '%ø%') OR (c_id LIKE '%ù%') OR (c_id LIKE '%ú%') OR (c_id LIKE '%û%') OR (c_id LIKE '%ü%') OR (c_id LIKE '%ý%') OR (c_id LIKE '%þ%') OR (c_id LIKE '%ÿ%')

END
GO
/****** Object:  Table [dbo].[RcvResult]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [RcvResult](
	[AccountName] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[PCName] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Serial] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[DateTimeLog] [datetime] NOT NULL,
 CONSTRAINT [PK_RcvResult] PRIMARY KEY CLUSTERED 
(
	[AccountName] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Merc]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [Merc](
	[HSName] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[MasterName] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Type] [int] NOT NULL,
	[HSLevel] [int] NOT NULL,
	[rb] [int] NULL,
	[reset_rb] [int] NULL,
 CONSTRAINT [PK_Merc] PRIMARY KEY CLUSTERED 
(
	[HSName] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[A3Web_Comment]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [A3Web_Comment](
	[bil] [int] IDENTITY(1,1) NOT NULL,
	[bil_post] [int] NOT NULL,
	[author] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[html] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[date] [smalldatetime] NOT NULL,
 CONSTRAINT [PK_A3Web_Comment_1] PRIMARY KEY CLUSTERED 
(
	[bil] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ClanMember]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [ClanMember](
	[ClanID] [int] NOT NULL,
	[ServerID] [varchar](50) COLLATE Latin1_General_CI_AS NOT NULL,
	[CharName] [varchar](50) COLLATE Latin1_General_CI_AS NOT NULL,
	[Level] [int] NOT NULL,
	[Class] [varchar](50) COLLATE Latin1_General_CI_AS NOT NULL,
	[Rank] [varchar](50) COLLATE Latin1_General_CI_AS NOT NULL,
 CONSTRAINT [PK_ClanMember] PRIMARY KEY CLUSTERED 
(
	[ClanID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[HSTABLE]    Script Date: 03/11/2018 01:05:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [HSTABLE](
	[HSID] [int] IDENTITY(1,1) NOT NULL,
	[HSName] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[MasterName] [varchar](50) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[Type] [tinyint] NOT NULL,
	[HSLevel] [smallint] NOT NULL,
	[HSExp] [int] NOT NULL,
	[Ability] [varchar](max) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
	[CreateDate] [smalldatetime] NOT NULL,
	[SaveDate] [smalldatetime] NULL,
	[HSState] [tinyint] NOT NULL,
	[DelDate] [smalldatetime] NULL,
	[HSBody] [varchar](1024) COLLATE SQL_Latin1_General_CP1251_CS_AS NOT NULL,
 CONSTRAINT [PK_Hstable] PRIMARY KEY CLUSTERED 
(
	[HSID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Trigger [tr_HSTABLE_UPDATE_LEVEL_MERC]    Script Date: 03/11/2018 01:05:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TRIGGER [tr_HSTABLE_UPDATE_LEVEL_MERC] ON  [HSTABLE] FOR UPDATE
AS 
IF UPDATE (HSLevel)

DECLARE @HSName varchar(50)
DECLARE @HSLevel int

-- IF EXISTS (SELECT * FROM inserted)

Set @HSName = (select HSName FROM inserted)
Set @HSLevel = (select HSLevel FROM inserted)

BEGIN
	SET NOCOUNT ON;
UPDATE dbo.Merc SET HSLevel = @HSLevel WHERE HSName = @HSName
END
GO
/****** Object:  Trigger [tr_HSTABLE_INSERT]    Script Date: 03/11/2018 01:05:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TRIGGER [tr_HSTABLE_INSERT]
   ON  [HSTABLE]
   FOR INSERT
AS 

DECLARE @HSName varchar(50)
DECLARE @MasterName varchar(50)
DECLARE @Type int
DECLARE @HSLevel int

IF EXISTS (SELECT * FROM inserted)

Set @HSName = (select HSName from inserted)
Set @MasterName = (select MasterName from inserted)
Set @Type = (select Type from inserted)
Set @HSLevel = (select HSLevel from inserted)

BEGIN
INSERT INTO dbo.Merc(HSName, MasterName, Type, HSLevel, rb, reset_rb) values (@HSName, @MasterName, @Type, @HSLevel, '0', '0')
END
GO
/****** Object:  Trigger [tr_HSTABLE_delete_data_MERC_UPDATE]    Script Date: 03/11/2018 01:05:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TRIGGER [tr_HSTABLE_delete_data_MERC_UPDATE] ON  [HSTABLE] FOR UPDATE
AS BEGIN
	SET NOCOUNT ON;
IF UPDATE (DelDate)
BEGIN
DECLARE @HSName varchar(50)
DECLARE @MasterName varchar(50)

-- IF EXISTS (SELECT * FROM inserted)

Set @HSName = (select HSName FROM inserted)
Set @MasterName = (select MasterName FROM inserted)

BEGIN
	SET NOCOUNT ON;
 DELETE FROM dbo.Merc WHERE HSName = @HSName AND MasterName = @MasterName
END
END
END
-- ###############################################################################################

-- ALTER TRIGGER [dbo].[tr_SCHEDULE_Modified]
--    ON [dbo].[SCHEDULE]
--    AFTER UPDATE
-- AS BEGIN
--     SET NOCOUNT ON;
--     IF UPDATE (QtyToRepair) 
--     BEGIN
--         UPDATE SCHEDULE 
--         SET modified = GETDATE()
--            , ModifiedUser = SUSER_NAME()
--            , ModifiedHost = HOST_NAME()
--         FROM SCHEDULE S INNER JOIN Inserted I 
--         ON S.OrderNo = I.OrderNo and S.PartNumber = I.PartNumber
--         WHERE S.QtyToRepair <> I.QtyToRepair
--     END 
-- END
GO
/****** Object:  Default [DF_charac0_rb]    Script Date: 03/11/2018 01:05:08 ******/
ALTER TABLE [Charac0] ADD  CONSTRAINT [DF_charac0_rb]  DEFAULT ((0)) FOR [rb]
GO
/****** Object:  Default [DF_charac0_times_rb]    Script Date: 03/11/2018 01:05:08 ******/
ALTER TABLE [Charac0] ADD  CONSTRAINT [DF_charac0_times_rb]  DEFAULT ((0)) FOR [times_rb]
GO
/****** Object:  Default [DF_MERC_rb]    Script Date: 03/11/2018 01:05:08 ******/
ALTER TABLE [Merc] ADD  CONSTRAINT [DF_MERC_rb]  DEFAULT ((0)) FOR [rb]
GO
/****** Object:  Default [DF_MERC_reset_rb]    Script Date: 03/11/2018 01:05:08 ******/
ALTER TABLE [Merc] ADD  CONSTRAINT [DF_MERC_reset_rb]  DEFAULT ((0)) FOR [reset_rb]
GO
/****** Object:  Check [CK_Account_alphabet]    Script Date: 03/11/2018 01:05:08 ******/
ALTER TABLE [Account]  WITH CHECK ADD  CONSTRAINT [CK_Account_alphabet] CHECK  ((NOT [c_id] like '%[^A-Za-z0-9]%'))
GO
ALTER TABLE [Account] CHECK CONSTRAINT [CK_Account_alphabet]
GO
/****** Object:  Check [ck_No_Special_Characters]    Script Date: 03/11/2018 01:05:08 ******/
ALTER TABLE [Charac0]  WITH NOCHECK ADD  CONSTRAINT [ck_No_Special_Characters] CHECK  ((NOT [c_id] like '%[^A-Za-z0-9]%'))
GO
ALTER TABLE [Charac0] CHECK CONSTRAINT [ck_No_Special_Characters]
GO
/****** Object:  Check [CK_Hstable]    Script Date: 03/11/2018 01:05:08 ******/
ALTER TABLE [HSTABLE]  WITH CHECK ADD  CONSTRAINT [CK_Hstable] CHECK  ((NOT [HSName] like '%[^A-Za-z0-9]%'))
GO
ALTER TABLE [HSTABLE] CHECK CONSTRAINT [CK_Hstable]
GO
