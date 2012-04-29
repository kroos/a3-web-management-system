USE [ASD]
GO
/****** Object:  Table [dbo].[Lotto]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[Lotto]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[Lotto](
	[LottoEventID] [smallint] NOT NULL,
	[AccountID] [char](20) NOT NULL,
	[SelectNum1] [tinyint] NOT NULL,
	[SelectNum2] [tinyint] NOT NULL,
	[SelectNum3] [tinyint] NOT NULL,
	[SelectNum4] [tinyint] NOT NULL,
	[SelectNum5] [tinyint] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LottoEvent]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[LottoEvent]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[LottoEvent](
	[LottoEventID] [smallint] NOT NULL,
	[EventName] [varchar](30) NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[OutAccount]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[OutAccount]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[OutAccount](
	[OutAccountID] [int] NOT NULL,
	[AccountID] [char](20) NOT NULL,
	[OutDate] [smalldatetime] NOT NULL,
	[Result] [char](1) NOT NULL,
	[ResultUser] [varchar](20) NULL,
	[ResultDesc] [varchar](4000) NULL,
	[Reason] [varchar](1000) NULL,
	[RestoreDate] [smalldatetime] NULL,
	[SCN] [varchar](14) NOT NULL,
	[PrevStatus] [char](1) NOT NULL,
	[ResultDate] [smalldatetime] NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[PcbangList]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[PcbangList]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[PcbangList](
	[AccountID] [char](20) NOT NULL,
	[PcbangCode] [varchar](12) NOT NULL,
	[PcbangName] [varchar](50) NOT NULL,
	[Owner] [varchar](20) NOT NULL,
	[SCN] [char](14) NOT NULL,
	[PcbangAddress] [varchar](255) NOT NULL,
	[PcbangZipcode] [char](7) NOT NULL,
	[OwnerAddress] [varchar](255) NOT NULL,
	[OwnerZipcode] [char](7) NOT NULL,
	[PcbangTel] [char](14) NOT NULL,
	[Uptae] [varchar](100) NOT NULL,
	[OpenDate] [varchar](10) NOT NULL,
	[Upzong] [varchar](100) NOT NULL,
	[Semuser] [varchar](30) NOT NULL,
	[RequestDate] [smalldatetime] NOT NULL,
	[Result] [char](1) NOT NULL,
	[ResultDate] [smalldatetime] NULL,
	[ResultDesc] [varchar](1000) NOT NULL,
	[ResultUser] [char](20) NOT NULL,
	[ResultNo] [int] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[QuestList]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[QuestList]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[QuestList](
	[QuestNo] [tinyint] NOT NULL,
	[Content] [varchar](50) NOT NULL,
	[QuestFlag] [bit] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[QuestResponse]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[QuestResponse]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[QuestResponse](
	[QuestNo] [tinyint] NOT NULL,
	[AnswerNo] [tinyint] NOT NULL,
	[AccountID] [char](20) NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[RandChar]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[RandChar]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[RandChar](
	[RandNo] [int] NOT NULL,
	[Rand] [int] NULL,
	[AccountID] [char](20) NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ReservedChar]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[ReservedChar]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[ReservedChar](
	[AccountID] [char](20) NOT NULL,
	[CharName] [varchar](50) NOT NULL,
	[ServerIdx] [tinyint] NOT NULL,
	[CharClass] [tinyint] NOT NULL,
	[Nation] [tinyint] NOT NULL,
	[GroupSeatID] [int] NULL,
	[RegistDate] [smalldatetime] NOT NULL,
	[Sex] [tinyint] NOT NULL,
	[Name] [char](20) NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ReservedPresent]    Script Date: 04/29/2012 23:03:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[ReservedPresent]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[ReservedPresent](
	[AccountID] [char](20) NOT NULL,
	[SeatName] [varchar](49) NULL,
	[PresentType] [varchar](20) NOT NULL,
	[Present] [varchar](100) NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[RestoreRequest]    Script Date: 04/29/2012 23:03:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[RestoreRequest]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[RestoreRequest](
	[RestoreRequestID] [int] NOT NULL,
	[AccountID] [char](20) NOT NULL,
	[SCN] [char](14) NOT NULL,
	[Result] [char](1) NOT NULL,
	[RequestDate] [smalldatetime] NOT NULL,
	[ResultDate] [smalldatetime] NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Sheet1]    Script Date: 04/29/2012 23:03:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[Sheet1]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[Sheet1](
	[F1] [nvarchar](255) NULL
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[StatusLog]    Script Date: 04/29/2012 23:03:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[StatusLog]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[StatusLog](
	[StatusLogID] [int] NOT NULL,
	[ManageID] [char](20) NOT NULL,
	[AccountID] [char](20) NOT NULL,
	[Status] [char](1) NOT NULL,
	[StartDate] [smalldatetime] NOT NULL,
	[EndDate] [smalldatetime] NOT NULL,
	[Content] [varchar](1000) NOT NULL,
	[LogDate] [smalldatetime] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[UpdateLog]    Script Date: 04/29/2012 23:03:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[UpdateLog]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[UpdateLog](
	[UpdateLogID] [int] NOT NULL,
	[ManageID] [char](20) NOT NULL,
	[AccountID] [char](20) NOT NULL,
	[UpdateContent] [varchar](3000) NOT NULL,
	[LogDate] [smalldatetime] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[UserTicket]    Script Date: 04/29/2012 23:03:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[UserTicket]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[UserTicket](
	[AccountID] [char](20) NOT NULL,
	[TicketNo] [char](12) NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[WebLoginLog]    Script Date: 04/29/2012 23:03:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[WebLoginLog]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[WebLoginLog](
	[WebLoginLogID] [int] NOT NULL,
	[AccountID] [char](20) NOT NULL,
	[LoginIP] [char](15) NOT NULL,
	[LoginDate] [smalldatetime] NOT NULL,
	[LoginSuccess] [char](1) NOT NULL,
	[AccessDeny] [bit] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[WebLoginRecentLog]    Script Date: 04/29/2012 23:03:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[WebLoginRecentLog]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[WebLoginRecentLog](
	[AccountID] [char](20) NOT NULL,
	[LoginIP] [char](15) NOT NULL,
	[CntLoginFailure] [int] NOT NULL,
	[CheckDate] [smalldatetime] NOT NULL,
	[AccessDenyDate] [smalldatetime] NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[WebLoginReport]    Script Date: 04/29/2012 23:03:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[WebLoginReport]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[WebLoginReport](
	[LoginYear] [smallint] NOT NULL,
	[LoginMonth] [tinyint] NOT NULL,
	[LoginDay] [tinyint] NOT NULL,
	[LoginHour] [tinyint] NOT NULL,
	[CntSuccess] [int] NOT NULL,
	[CntFailure] [int] NOT NULL,
	[CntAccessDeny] [int] NOT NULL
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[ZipCode]    Script Date: 04/29/2012 23:03:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[ZipCode]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[ZipCode](
	[zipidx] [int] NOT NULL,
	[zipcode] [char](7) NOT NULL,
	[sido] [varchar](8) NOT NULL,
	[gugun] [varchar](11) NOT NULL,
	[dong] [varchar](41) NOT NULL,
	[note1] [varchar](26) NULL,
	[note2] [varchar](18) NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[charac0]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[charac0]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[charac0](
	[c_id] [varchar](50) NOT NULL,
	[c_sheadera] [varchar](255) NOT NULL,
	[c_sheaderb] [varchar](255) NOT NULL,
	[c_sheaderc] [int] NOT NULL,
	[c_headera] [varchar](255) NOT NULL,
	[c_headerb] [varchar](255) NOT NULL,
	[c_headerc] [varchar](255) NOT NULL,
	[d_cdate] [smalldatetime] NULL,
	[d_udate] [smalldatetime] NULL,
	[c_status] [varchar](50) NOT NULL,
	[m_body] [varchar](4000) NOT NULL,
	[rb] [int] NOT NULL CONSTRAINT [DF_charac0_rb]  DEFAULT (0),
	[times_rb] [int] NOT NULL CONSTRAINT [DF_charac0_times_rb]  DEFAULT (0)
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[vAdultAge]    Script Date: 04/29/2012 23:03:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[vAdultAge]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[vAdultAge](
	[age] [int] NULL
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[vItemStorage]    Script Date: 04/29/2012 23:03:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[vItemStorage]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[vItemStorage](
	[c_id] [char](20) NULL,
	[c_sheadera] [varchar](255) NULL,
	[c_sheaderb] [varchar](255) NULL,
	[c_sheaderc] [varchar](255) NULL,
	[c_headera] [varchar](255) NULL,
	[c_headerb] [varchar](255) NULL,
	[c_headerc] [varchar](255) NULL,
	[d_cdate] [datetime] NULL,
	[d_udate] [datetime] NULL,
	[c_status] [char](1) NULL,
	[m_body] [text] NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[vStatAuth1]    Script Date: 04/29/2012 23:03:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[vStatAuth1]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[vStatAuth1](
	[AuthType] [char](1) NULL,
	[ResultO] [int] NOT NULL,
	[ResultA] [int] NOT NULL,
	[Total] [int] NOT NULL,
	[AuthTypeName] [varchar](7) NOT NULL,
	[ResultOP] [decimal](28, 12) NULL,
	[ResultAP] [decimal](28, 12) NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[vStatAuth2]    Script Date: 04/29/2012 23:03:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[vStatAuth2]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[vStatAuth2](
	[Result] [char](1) NULL,
	[AuthTypeB] [int] NOT NULL,
	[AuthTypeC] [int] NOT NULL,
	[AuthTypeD] [int] NOT NULL,
	[AuthTypeE] [int] NOT NULL,
	[Total] [int] NOT NULL,
	[ResultName] [varchar](3) NOT NULL,
	[AuthTypeBP] [decimal](28, 12) NULL,
	[AuthTypeCP] [decimal](28, 12) NULL,
	[AuthTypeDP] [decimal](28, 12) NULL,
	[AuthTypeEP] [decimal](28, 12) NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[vStatPcbang1]    Script Date: 04/29/2012 23:03:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[vStatPcbang1]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[vStatPcbang1](
	[Sido] [varchar](4) NULL,
	[Gugun] [varchar](6) NULL,
	[TypeA] [int] NULL,
	[TypeO] [int] NULL,
	[Total] [int] NULL,
	[Ratio] [float] NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[vStatPcbang2]    Script Date: 04/29/2012 23:03:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[vStatPcbang2]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[vStatPcbang2](
	[Sido] [varchar](4) NULL,
	[TypeA] [int] NULL,
	[TypeO] [int] NULL,
	[Total] [int] NULL,
	[Ratio] [float] NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[vStorage]    Script Date: 04/29/2012 23:03:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[vStorage]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[vStorage](
	[HistoryDate] [datetime] NOT NULL,
	[ServerID] [int] NOT NULL,
	[AccountID] [char](20) NULL,
	[Money] [varchar](255) NULL,
	[CreateDate] [datetime] NULL,
	[LastDate] [datetime] NULL,
	[Status] [char](1) NULL,
	[BodyInfo] [text] NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[v_beta]    Script Date: 04/29/2012 23:03:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[v_beta]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[v_beta](
	[AccountID] [char](20) NOT NULL,
	[Motive] [varchar](200) NULL,
	[Result] [char](1) NOT NULL,
	[UserName] [char](20) NOT NULL,
	[SCN] [char](15) NOT NULL,
	[ResultDate] [smalldatetime] NULL,
	[ResultUser] [char](20) NULL,
	[ResultNo] [int] NOT NULL,
	[ResultDesc] [varchar](2000) NULL,
	[AuthType] [char](1) NOT NULL,
	[RegistDate] [smalldatetime] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[v_cpu]    Script Date: 04/29/2012 23:03:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[v_cpu]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[v_cpu](
	[QuestNo] [tinyint] NOT NULL,
	[AnswerNo] [tinyint] NOT NULL,
	[AccountID] [char](20) NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[v_os]    Script Date: 04/29/2012 23:03:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[v_os]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[v_os](
	[QuestNo] [tinyint] NOT NULL,
	[AnswerNo] [tinyint] NOT NULL,
	[AccountID] [char](20) NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[v_ram]    Script Date: 04/29/2012 23:03:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[v_ram]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[v_ram](
	[QuestNo] [tinyint] NOT NULL,
	[AnswerNo] [tinyint] NOT NULL,
	[AccountID] [char](20) NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[v_vga]    Script Date: 04/29/2012 23:03:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[v_vga]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[v_vga](
	[QuestNo] [tinyint] NOT NULL,
	[AnswerNo] [tinyint] NOT NULL,
	[AccountID] [char](20) NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[vcharac]    Script Date: 04/29/2012 23:03:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[vcharac]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[vcharac](
	[c_id] [char](20) NULL,
	[c_sheadera] [varchar](255) NULL,
	[c_sheaderb] [varchar](255) NULL,
	[c_sheaderc] [varchar](255) NULL,
	[c_headera] [varchar](255) NULL,
	[c_headerb] [varchar](255) NULL,
	[c_headerc] [varchar](255) NULL,
	[d_cdate] [smalldatetime] NULL,
	[d_udate] [smalldatetime] NULL,
	[c_status] [char](1) NULL,
	[m_body] [varchar](4000) NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[temp_account]    Script Date: 04/29/2012 23:03:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[temp_account]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[temp_account](
	[username] [varchar](50) NULL,
	[password] [varchar](50) NULL,
	[email] [varchar](50) NULL,
	[passkey] [varchar](50) NULL,
	[date] [smalldatetime] NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Ban_IP]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[Ban_IP]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[Ban_IP](
	[List_IP] [varchar](50) NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[AccountAuth]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[AccountAuth]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[AccountAuth](
	[AccountID] [char](20) NOT NULL,
	[AuthType] [char](1) NOT NULL,
	[AuthDate] [smalldatetime] NOT NULL,
	[Result] [char](1) NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[AccountExt]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[AccountExt]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[AccountExt](
	[AccountID] [char](20) NOT NULL,
	[Job] [char](1) NOT NULL,
	[RecomID] [char](20) NOT NULL,
	[EmailStatus] [bit] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[AccountFailAuth]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[AccountFailAuth]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[AccountFailAuth](
	[FailAuthID] [int] NOT NULL,
	[AccountID] [char](20) NOT NULL,
	[SCN1] [char](15) NOT NULL,
	[SCN2] [char](15) NOT NULL,
	[AuthDate] [smalldatetime] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[AdultCheck]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[AdultCheck]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[AdultCheck](
	[Name] [char](20) NOT NULL,
	[SCN] [char](13) NOT NULL,
	[RegDate] [smalldatetime] NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Answer]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[Answer]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[Answer](
	[QuestNo] [tinyint] NOT NULL,
	[AnswerNo] [tinyint] NOT NULL,
	[Content] [varchar](100) NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[AuthLog]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[AuthLog]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[AuthLog](
	[AuthLogID] [int] NOT NULL,
	[AccountID] [char](20) NOT NULL,
	[AuthType] [char](1) NOT NULL,
	[AuthDate] [smalldatetime] NOT NULL,
	[Result] [char](1) NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Beta3_1]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[Beta3_1]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[Beta3_1](
	[BetaID] [int] NOT NULL,
	[BetaRandNum] [int] NULL,
	[AccountID] [char](20) NOT NULL,
	[Scn] [varchar](20) NULL,
	[Zipcode] [varchar](10) NULL,
	[Region] [varchar](10) NULL,
	[Age] [varchar](5) NULL,
	[Sex] [tinyint] NULL,
	[Result] [char](1) NULL,
	[BetaNum] [tinyint] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Beta4]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[Beta4]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[Beta4](
	[AccountID] [char](20) NOT NULL,
	[CntLogin] [int] NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[BetaArgee]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[BetaArgee]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[BetaArgee](
	[AccountID] [char](20) NOT NULL,
	[AgreeStatus] [bit] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[BetaPcbang]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[BetaPcbang]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[BetaPcbang](
	[AccountID] [char](20) NOT NULL,
	[PcbangCode] [varchar](12) NULL,
	[PcbangName] [varchar](50) NULL,
	[Owner] [varchar](20) NULL,
	[Scn] [char](14) NULL,
	[OpenDate] [varchar](10) NULL,
	[PcbangAddress] [varchar](255) NULL,
	[PcbangZipcode] [char](7) NULL,
	[OwnerAddress] [varchar](255) NULL,
	[OwnerZipcode] [char](7) NULL,
	[Uptae] [varchar](100) NULL,
	[Upzong] [varchar](100) NULL,
	[Semuser] [varchar](30) NULL,
	[AccountIDStatus] [char](1) NOT NULL,
	[RequestDate] [smalldatetime] NOT NULL,
	[Result] [char](1) NOT NULL,
	[ResultDesc] [varchar](1000) NULL,
	[ResultUser] [char](20) NULL,
	[ResultDate] [smalldatetime] NULL,
	[ResultNo] [int] NOT NULL,
	[ResultType] [char](1) NOT NULL,
	[Tel] [varchar](20) NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[BetaPcbangIP]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[BetaPcbangIP]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[BetaPcbangIP](
	[AccountID] [char](20) NOT NULL,
	[IP] [varchar](15) NOT NULL,
	[Result] [char](1) NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[account]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[account]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[account](
	[c_id] [varchar](50) NOT NULL,
	[c_sheadera] [varchar](255) NOT NULL,
	[c_sheaderb] [varchar](255) NOT NULL,
	[c_sheaderc] [varchar](255) NOT NULL,
	[c_headera] [varchar](255) NOT NULL,
	[c_headerb] [varchar](255) NOT NULL,
	[c_headerc] [varchar](255) NOT NULL,
	[d_cdate] [smalldatetime] NULL,
	[d_udate] [smalldatetime] NULL,
	[c_status] [char](10) NOT NULL,
	[m_body] [varchar](4000) NULL,
	[acc_status] [varchar](50) NULL,
	[salary] [smalldatetime] NULL,
	[last_salary] [smalldatetime] NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[A3Web_HTML]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[A3Web_HTML]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[A3Web_HTML](
	[Bil] [int] IDENTITY(1,1) NOT NULL,
	[Author] [varchar](50) NULL,
	[Category] [varchar](50) NULL,
	[Subject] [varchar](50) NULL,
	[HTML] [varchar](4000) NULL,
	[Date] [smalldatetime] NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[BetaPresent]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[BetaPresent]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[BetaPresent](
	[AccountID] [char](20) NOT NULL,
	[Present] [char](1) NOT NULL,
	[PresentType] [char](1) NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[BetaTester]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[BetaTester]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[BetaTester](
	[AccountID] [char](20) NOT NULL,
	[Motive] [varchar](200) NULL,
	[Result] [char](1) NOT NULL,
	[UserName] [char](20) NOT NULL,
	[SCN] [char](15) NOT NULL,
	[ResultDate] [smalldatetime] NULL,
	[ResultUser] [char](20) NULL,
	[ResultNo] [int] NOT NULL,
	[ResultDesc] [varchar](2000) NULL,
	[AuthType] [char](1) NOT NULL,
	[RegistDate] [smalldatetime] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[BetaTester1]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[BetaTester1]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[BetaTester1](
	[BetaID] [int] NOT NULL,
	[BetaRandNum] [int] NULL,
	[AccountID] [char](20) NOT NULL,
	[Scn] [varchar](20) NULL,
	[Zipcode] [varchar](10) NULL,
	[Region] [varchar](10) NULL,
	[Age] [varchar](5) NULL,
	[Sex] [tinyint] NULL,
	[Result] [char](1) NULL,
	[BetaNum] [tinyint] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[BetaTester2]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[BetaTester2]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[BetaTester2](
	[BetaID] [int] NOT NULL,
	[BetaRandNum] [int] NULL,
	[AccountID] [char](20) NOT NULL,
	[Scn] [varchar](20) NULL,
	[ZipCode] [varchar](10) NULL,
	[Region] [varchar](41) NULL,
	[Age] [varchar](5) NULL,
	[Sex] [tinyint] NULL,
	[Result] [char](1) NULL,
	[BetaNum] [tinyint] NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[BetaTester3]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[BetaTester3]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[BetaTester3](
	[BetaID] [int] NOT NULL,
	[BetaRandNum] [int] NULL,
	[AccountID] [char](20) NOT NULL,
	[Scn] [varchar](20) NULL,
	[ZipCode] [varchar](10) NULL,
	[Region] [varchar](41) NULL,
	[Age] [varchar](5) NULL,
	[Sex] [tinyint] NULL,
	[Result] [char](1) NULL,
	[BetaNum] [tinyint] NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[BetaTester4]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[BetaTester4]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[BetaTester4](
	[BetaID] [int] NOT NULL,
	[BetaRandNum] [int] NULL,
	[AccountID] [char](20) NOT NULL,
	[Scn] [varchar](20) NULL,
	[ZipCode] [varchar](10) NULL,
	[Region] [varchar](41) NULL,
	[Age] [varchar](5) NULL,
	[Sex] [tinyint] NULL,
	[Result] [char](1) NULL,
	[BetaNum] [tinyint] NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[BetaWebLoginLog]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[BetaWebLoginLog]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[BetaWebLoginLog](
	[BetaWebLoginLogID] [int] NOT NULL,
	[AccountID] [char](20) NOT NULL,
	[IpAddr] [char](15) NOT NULL,
	[LoginDate] [smalldatetime] NOT NULL,
	[LoginCheck] [tinyint] NOT NULL,
	[AccessDeny] [bit] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[BlackList]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[BlackList]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[BlackList](
	[BlackListID] [int] NOT NULL,
	[AccountID] [char](20) NOT NULL,
	[BlockStartDate] [smalldatetime] NOT NULL,
	[BlockEndDate] [smalldatetime] NOT NULL,
	[AccountStatus] [char](1) NOT NULL,
	[Status] [char](1) NOT NULL,
	[Content] [varchar](1000) NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Count]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[Count]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[Count](
	[count] [int] NOT NULL
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[DenyChar]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[DenyChar]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[DenyChar](
	[DenyCharID] [char](20) NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[FaultMailAccount]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[FaultMailAccount]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[FaultMailAccount](
	[AccountID] [char](20) NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[CharInfo]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[CharInfo]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[CharInfo](
	[AccountID] [varchar](8000) NULL,
	[ServerIdx] [int] NULL,
	[CharName] [varchar](8000) NULL,
	[Class] [int] NULL,
	[Nation] [int] NULL,
	[Default] [varchar](8000) NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Member]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[Member]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[Member](
	[MemberName] [varchar](50) NULL,
	[MemberRank] [int] NULL,
	[Type] [int] NULL,
	[OrderLevel] [int] NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ClanInfo]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[ClanInfo]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[ClanInfo](
	[ClanID] [char](2) NULL,
	[ServerID] [char](1) NULL,
	[ClanName] [char](10) NULL,
	[Nation] [char](10) NULL,
	[MarkID] [char](10) NULL,
	[CDate] [smalldatetime] NULL,
	[DDate] [smalldatetime] NULL,
	[ClanPasswd] [char](10) NULL,
	[ClanRank] [char](10) NULL,
	[ClanStatus] [char](1) NULL,
	[StorageID] [char](10) NULL,
	[AgitID] [char](10) NULL,
	[WinCount] [char](10) NULL,
	[LoseCount] [char](10) NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ClanMember]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[ClanMember]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[ClanMember](
	[ClanID] [int] NOT NULL,
	[ServerID] [int] NOT NULL,
	[CharName] [varchar](50) NOT NULL,
	[Level] [int] NOT NULL,
	[Class] [int] NOT NULL,
	[Rank] [int] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[cdg_icdata]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[cdg_icdata]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[cdg_icdata](
	[item1] [int] NOT NULL DEFAULT ((0)),
	[item2] [int] NOT NULL DEFAULT ((0)),
	[item3] [int] NOT NULL DEFAULT ((0)),
	[item4] [int] NOT NULL DEFAULT ((0)),
	[item5] [int] NOT NULL DEFAULT ((0)),
	[item6] [int] NOT NULL DEFAULT ((0)),
	[item7] [int] NOT NULL DEFAULT ((0)),
	[item8] [int] NOT NULL DEFAULT ((0)),
	[item9] [int] NOT NULL DEFAULT ((0)),
	[item10] [int] NOT NULL DEFAULT ((0)),
	[item11] [int] NOT NULL DEFAULT ((0)),
	[item12] [int] NOT NULL DEFAULT ((0)),
	[item13] [int] NOT NULL DEFAULT ((0)),
	[item14] [int] NOT NULL DEFAULT ((0)),
	[item15] [int] NOT NULL DEFAULT ((0)),
	[item16] [int] NOT NULL DEFAULT ((0))
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[cdg_mondrops]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[cdg_mondrops]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[cdg_mondrops](
	[monsterid] [int] NOT NULL DEFAULT ((0)),
	[itemcode] [int] NOT NULL DEFAULT ((0)),
	[dropcount] [bigint] NOT NULL DEFAULT ((0)),
	[monstername] [varchar](20) NULL DEFAULT ('')
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[captcha]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[captcha]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[captcha](
	[captcha_id] [bigint] IDENTITY(1,1) NOT NULL,
	[captcha_time] [int] NOT NULL,
	[ip_address] [varchar](50) NOT NULL,
	[word] [varchar](50) NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[A3Web_Comment]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[A3Web_Comment]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[A3Web_Comment](
	[bil] [int] IDENTITY(1,1) NOT NULL,
	[bil_post] [int] NOT NULL,
	[author] [varchar](50) NOT NULL,
	[html] [varchar](max) NOT NULL,
	[date] [smalldatetime] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[GameBroadcast]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[GameBroadcast]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[GameBroadcast](
	[GameBroadcastID] [int] NOT NULL,
	[AccountID] [char](20) NOT NULL,
	[RequestDate] [smalldatetime] NOT NULL,
	[Job] [varchar](200) NOT NULL,
	[Motive] [varchar](2000) NOT NULL,
	[Intro] [varchar](2000) NOT NULL,
	[FilePath] [varchar](200) NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[GameLoginLog]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[GameLoginLog]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[GameLoginLog](
	[LoginIdx] [int] NOT NULL,
	[AccountID] [char](20) NOT NULL,
	[LoginIP] [varchar](15) NOT NULL,
	[LoginDate] [smalldatetime] NOT NULL,
	[PayMode] [char](3) NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[GameServer]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[GameServer]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[GameServer](
	[ServerIdx] [tinyint] NOT NULL,
	[ServerName] [char](16) NOT NULL,
	[CntRegist] [int] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[GameServerMessage]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[GameServerMessage]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[GameServerMessage](
	[AccountID] [ntext] NULL,
	[StatusID] [ntext] NULL,
	[mbody] [ntext] NULL,
	[Message] [ntext] NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[GroupSeat]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[GroupSeat]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[GroupSeat](
	[GroupSeatID] [int] NOT NULL,
	[Master] [char](20) NOT NULL,
	[SeatName] [varchar](40) NOT NULL,
	[SeatType] [char](1) NOT NULL,
	[SeatPassword] [varchar](15) NOT NULL,
	[ServerIdx] [tinyint] NOT NULL,
	[CntRegist] [tinyint] NOT NULL,
	[Name] [char](20) NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[InnerAccount]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[InnerAccount]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[InnerAccount](
	[AccountID] [char](20) NOT NULL,
	[Desc] [varchar](500) NOT NULL,
	[CreateDate] [smalldatetime] NOT NULL,
	[Creater] [char](8) NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ItemStorage0]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[ItemStorage0]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[ItemStorage0](
	[c_id] [char](20) NOT NULL,
	[c_sheadera] [varchar](255) NOT NULL,
	[c_sheaderb] [varchar](255) NOT NULL,
	[c_sheaderc] [varchar](255) NOT NULL,
	[c_headera] [varchar](255) NOT NULL,
	[c_headerb] [varchar](255) NOT NULL,
	[c_headerc] [varchar](255) NOT NULL,
	[d_cdate] [datetime] NULL,
	[d_udate] [datetime] NULL,
	[c_status] [char](1) NOT NULL,
	[m_body] [text] NOT NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Job]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[Job]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[Job](
	[JobID] [char](1) NOT NULL,
	[JobName] [varchar](100) NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LoginLog]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[LoginLog]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[LoginLog](
	[SCN] [char](13) NOT NULL,
	[LoginDate] [datetime] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[LotteryTicket]    Script Date: 04/29/2012 23:03:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[LotteryTicket]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[LotteryTicket](
	[LotteryTicketID] [bigint] NOT NULL,
	[IsUsed] [char](1) NOT NULL,
	[TicketNo] [char](12) NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
