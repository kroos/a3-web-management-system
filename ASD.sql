USE [ASD]
GO
/****** Object:  UserDefinedFunction [GetAccountName]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[GetAccountName]') AND type in (N'FN', N'IF', N'TF', N'FS', N'FT'))
BEGIN
execute dbo.sp_executesql @statement = N'
CREATE  FUNCTION [GetAccountName](@CharacterName char(20))
RETURNS char(20) AS  
BEGIN   
   DECLARE @AccountName char(20)
   select @AccountName = c_sheadera
   from ASD.dbo.Character
   where c_id=@CharacterName

   RETURN @AccountName
END

' 
END

GO
/****** Object:  Table [A3Web_Comment]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[A3Web_Comment]') AND type in (N'U'))
BEGIN
CREATE TABLE [A3Web_Comment](
	[bil] [int] IDENTITY(1,1) NOT NULL,
	[bil_post] [int] NOT NULL,
	[author] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[html] [varchar](max) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[date] [smalldatetime] NOT NULL,
 CONSTRAINT [PK_A3Web_Comment_1] PRIMARY KEY CLUSTERED 
(
	[bil] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [A3Web_HTML]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[A3Web_HTML]') AND type in (N'U'))
BEGIN
CREATE TABLE [A3Web_HTML](
	[Bil] [int] IDENTITY(1,1) NOT NULL,
	[Author] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[Category] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[Subject] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[HTML] [varchar](4000) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[Date] [smalldatetime] NULL,
 CONSTRAINT [PK_A3Web_HTML] PRIMARY KEY CLUSTERED 
(
	[Bil] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [Account]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[Account]') AND type in (N'U'))
BEGIN
CREATE TABLE [Account](
	[c_id] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[c_sheadera] [varchar](255) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[c_sheaderb] [varchar](255) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[c_sheaderc] [varchar](255) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[c_headera] [varchar](255) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[c_headerb] [varchar](255) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[c_headerc] [varchar](255) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[d_cdate] [smalldatetime] NULL,
	[d_udate] [smalldatetime] NULL,
	[c_status] [char](10) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[m_body] [varchar](4000) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[acc_status] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[salary] [smalldatetime] NULL,
	[last_salary] [smalldatetime] NULL,
 CONSTRAINT [PK_Account_unique] PRIMARY KEY CLUSTERED 
(
	[c_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [AccountAuth]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[AccountAuth]') AND type in (N'U'))
BEGIN
CREATE TABLE [AccountAuth](
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[AuthType] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[AuthDate] [smalldatetime] NOT NULL,
	[Result] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [AccountExt]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[AccountExt]') AND type in (N'U'))
BEGIN
CREATE TABLE [AccountExt](
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Job] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[RecomID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[EmailStatus] [bit] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [AccountFailAuth]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[AccountFailAuth]') AND type in (N'U'))
BEGIN
CREATE TABLE [AccountFailAuth](
	[FailAuthID] [int] NOT NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[SCN1] [char](15) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[SCN2] [char](15) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[AuthDate] [smalldatetime] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [AdultCheck]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[AdultCheck]') AND type in (N'U'))
BEGIN
CREATE TABLE [AdultCheck](
	[Name] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[SCN] [char](13) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[RegDate] [smalldatetime] NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [Answer]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[Answer]') AND type in (N'U'))
BEGIN
CREATE TABLE [Answer](
	[QuestNo] [tinyint] NOT NULL,
	[AnswerNo] [tinyint] NOT NULL,
	[Content] [varchar](100) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [AuthLog]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[AuthLog]') AND type in (N'U'))
BEGIN
CREATE TABLE [AuthLog](
	[AuthLogID] [int] NOT NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[AuthType] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[AuthDate] [smalldatetime] NOT NULL,
	[Result] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [Ban_IP]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[Ban_IP]') AND type in (N'U'))
BEGIN
CREATE TABLE [Ban_IP](
	[List_IP] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [BlackList]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[BlackList]') AND type in (N'U'))
BEGIN
CREATE TABLE [BlackList](
	[BlackListID] [int] NOT NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[BlockStartDate] [smalldatetime] NOT NULL,
	[BlockEndDate] [smalldatetime] NOT NULL,
	[AccountStatus] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Status] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Content] [varchar](1000) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [Captcha]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[Captcha]') AND type in (N'U'))
BEGIN
CREATE TABLE [Captcha](
	[captcha_id] [bigint] IDENTITY(1,1) NOT NULL,
	[captcha_time] [int] NULL,
	[ip_address] [varchar](50) COLLATE Latin1_General_CI_AS NULL,
	[word] [varchar](50) COLLATE Latin1_General_CI_AS NULL,
 CONSTRAINT [PK_Captcha] PRIMARY KEY CLUSTERED 
(
	[captcha_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [Charac0]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[Charac0]') AND type in (N'U'))
BEGIN
CREATE TABLE [Charac0](
	[c_id] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[c_sheadera] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[c_sheaderb] [varchar](255) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[c_sheaderc] [int] NOT NULL,
	[c_headera] [varchar](255) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[c_headerb] [varchar](255) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[c_headerc] [varchar](255) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[d_cdate] [smalldatetime] NULL,
	[d_udate] [smalldatetime] NULL,
	[c_status] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[m_body] [varchar](4000) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[rb] [int] NOT NULL CONSTRAINT [DF_charac0_rb]  DEFAULT ((0)),
	[times_rb] [int] NOT NULL CONSTRAINT [DF_charac0_times_rb]  DEFAULT ((0)),
 CONSTRAINT [PK_Charac0] PRIMARY KEY CLUSTERED 
(
	[c_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [CharInfo]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[CharInfo]') AND type in (N'U'))
BEGIN
CREATE TABLE [CharInfo](
	[ServerIdx] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[Nation] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[AccountID] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[CharName] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [Clan]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[Clan]') AND type in (N'U'))
BEGIN
CREATE TABLE [Clan](
	[ClanID] [char](2) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[ServerID] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[ClanName] [varchar](10) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Nation] [varchar](10) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[MarkID] [varchar](10) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[CDate] [smalldatetime] NULL,
	[DDate] [smalldatetime] NULL,
	[ClanPasswd] [varchar](10) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[ClanRank] [varchar](10) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[ClanStatus] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[StorageID] [varchar](10) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[AgitID] [varchar](10) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[WinCount] [int] NOT NULL,
	[LoseCount] [int] NOT NULL,
 CONSTRAINT [PK_Clan] PRIMARY KEY CLUSTERED 
(
	[ClanID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [Count]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[Count]') AND type in (N'U'))
BEGIN
CREATE TABLE [Count](
	[count] [int] NOT NULL
) ON [PRIMARY]
END
GO
/****** Object:  Table [DenyChar]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DenyChar]') AND type in (N'U'))
BEGIN
CREATE TABLE [DenyChar](
	[DenyCharID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [FaultMailAccount]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[FaultMailAccount]') AND type in (N'U'))
BEGIN
CREATE TABLE [FaultMailAccount](
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [FRIEND0]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[FRIEND0]') AND type in (N'U'))
BEGIN
CREATE TABLE [FRIEND0](
	[CharName] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[GroupInfo] [varchar](1024) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[FriendInfo] [varchar](1024) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [GameBroadcast]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[GameBroadcast]') AND type in (N'U'))
BEGIN
CREATE TABLE [GameBroadcast](
	[GameBroadcastID] [int] NOT NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[RequestDate] [smalldatetime] NOT NULL,
	[Job] [varchar](200) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Motive] [varchar](2000) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Intro] [varchar](2000) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[FilePath] [varchar](200) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [GameLoginLog]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[GameLoginLog]') AND type in (N'U'))
BEGIN
CREATE TABLE [GameLoginLog](
	[LoginIdx] [int] NOT NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[LoginIP] [varchar](15) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[LoginDate] [smalldatetime] NOT NULL,
	[PayMode] [char](3) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [GameServer]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[GameServer]') AND type in (N'U'))
BEGIN
CREATE TABLE [GameServer](
	[ServerIdx] [tinyint] NOT NULL,
	[ServerName] [char](16) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[CntRegist] [int] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [GameServerMessage]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[GameServerMessage]') AND type in (N'U'))
BEGIN
CREATE TABLE [GameServerMessage](
	[AccountID] [ntext] COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[StatusID] [ntext] COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[mbody] [ntext] COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[Message] [ntext] COLLATE SQL_Latin1_General_CP1_CI_AS NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
/****** Object:  Table [GroupSeat]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[GroupSeat]') AND type in (N'U'))
BEGIN
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
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [Hsstonetable]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[Hsstonetable]') AND type in (N'U'))
BEGIN
CREATE TABLE [Hsstonetable](
	[MasterName] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[CreateDate] [smalldatetime] NULL,
	[SaveDate] [smalldatetime] NULL,
	[Slot0] [varchar](256) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[Slot1] [varchar](256) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[Slot2] [varchar](256) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[Slot3] [varchar](256) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
 CONSTRAINT [PK_Hsstonetable] PRIMARY KEY CLUSTERED 
(
	[MasterName] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [Hstable]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[Hstable]') AND type in (N'U'))
BEGIN
CREATE TABLE [Hstable](
	[HSID] [int] IDENTITY(1,1) NOT NULL,
	[HSName] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[MasterName] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Type] [tinyint] NOT NULL,
	[HSLevel] [smallint] NOT NULL,
	[HSExp] [int] NOT NULL,
	[Ability] [varchar](1024) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[CreateDate] [smalldatetime] NOT NULL,
	[SaveDate] [smalldatetime] NOT NULL,
	[HSState] [tinyint] NULL,
	[DelDate] [smalldatetime] NULL,
	[HSBody] [varchar](1024) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
 CONSTRAINT [PK_Hstable] PRIMARY KEY CLUSTERED 
(
	[HSID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [InnerAccount]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[InnerAccount]') AND type in (N'U'))
BEGIN
CREATE TABLE [InnerAccount](
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Desc] [varchar](500) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[CreateDate] [smalldatetime] NOT NULL,
	[Creater] [char](8) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [ItemStorage]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[ItemStorage]') AND type in (N'U'))
BEGIN
CREATE TABLE [ItemStorage](
	[c_id] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[c_sheadera] [varchar](255) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[c_sheaderb] [varchar](255) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[c_sheaderc] [varchar](255) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[c_headera] [varchar](255) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[c_headerb] [varchar](255) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[c_headerc] [varchar](255) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[d_cdate] [datetime] NULL,
	[d_udate] [datetime] NULL,
	[c_status] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[m_body] [varchar](max) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [Job]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[Job]') AND type in (N'U'))
BEGIN
CREATE TABLE [Job](
	[JobID] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[JobName] [varchar](100) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [LETTERDB0]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[LETTERDB0]') AND type in (N'U'))
BEGIN
CREATE TABLE [LETTERDB0](
	[LetterIdx] [int] IDENTITY(1,1) NOT NULL,
	[Receiver] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Sender] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[SendDate] [smalldatetime] NOT NULL,
	[Reading] [tinyint] NOT NULL,
	[Keeping] [tinyint] NOT NULL,
	[Title] [varchar](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[LetterMsg] [varchar](max) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
 CONSTRAINT [PK_LETTERDB0] PRIMARY KEY CLUSTERED 
(
	[LetterIdx] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [LoginLog]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[LoginLog]') AND type in (N'U'))
BEGIN
CREATE TABLE [LoginLog](
	[SCN] [char](13) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[LoginDate] [datetime] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [LotteryTicket]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[LotteryTicket]') AND type in (N'U'))
BEGIN
CREATE TABLE [LotteryTicket](
	[LotteryTicketID] [bigint] NOT NULL,
	[IsUsed] [varchar](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[TicketNo] [varchar](12) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
 CONSTRAINT [PK_LotteryTicket] PRIMARY KEY CLUSTERED 
(
	[LotteryTicketID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [Lotto]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[Lotto]') AND type in (N'U'))
BEGIN
CREATE TABLE [Lotto](
	[LottoEventID] [smallint] NOT NULL,
	[AccountID] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
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
/****** Object:  Table [LottoEvent]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[LottoEvent]') AND type in (N'U'))
BEGIN
CREATE TABLE [LottoEvent](
	[LottoEventID] [smallint] NOT NULL,
	[EventName] [varchar](30) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [Merc]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[Merc]') AND type in (N'U'))
BEGIN
CREATE TABLE [Merc](
	[HSName] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[MasterName] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Type] [int] NOT NULL,
	[HSLevel] [int] NOT NULL,
	[rb] [int] NULL,
	[reset_rb] [int] NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [OutAccount]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[OutAccount]') AND type in (N'U'))
BEGIN
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
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [PcbangList]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[PcbangList]') AND type in (N'U'))
BEGIN
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
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [QuestList]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[QuestList]') AND type in (N'U'))
BEGIN
CREATE TABLE [QuestList](
	[QuestNo] [tinyint] NOT NULL,
	[Content] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[QuestFlag] [bit] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [QuestResponse]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[QuestResponse]') AND type in (N'U'))
BEGIN
CREATE TABLE [QuestResponse](
	[QuestNo] [tinyint] NOT NULL,
	[AnswerNo] [tinyint] NOT NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [RandChar]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[RandChar]') AND type in (N'U'))
BEGIN
CREATE TABLE [RandChar](
	[RandNo] [int] NOT NULL,
	[Rand] [int] NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [rbstat]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[rbstat]') AND type in (N'U'))
BEGIN
CREATE TABLE [rbstat](
	[c_id] [nvarchar](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[c_sheadera] [nvarchar](255) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[c_sheaderb] [nvarchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[c_sheaderc] [nvarchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[c_headera] [nvarchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[c_headerb] [nvarchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[c_headerc] [nvarchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[d_cdate] [smalldatetime] NULL,
	[d_udate] [smalldatetime] NULL,
	[c_status] [nvarchar](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[m_body] [ntext] COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[number_rb] [int] NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
/****** Object:  Table [RcvResult]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[RcvResult]') AND type in (N'U'))
BEGIN
CREATE TABLE [RcvResult](
	[AccountName] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[PCName] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Serial] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[DateTimeLog] [datetime] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [ReservedChar]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[ReservedChar]') AND type in (N'U'))
BEGIN
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
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [ReservedPresent]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[ReservedPresent]') AND type in (N'U'))
BEGIN
CREATE TABLE [ReservedPresent](
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[SeatName] [varchar](49) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[PresentType] [varchar](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Present] [varchar](100) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [RestoreRequest]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[RestoreRequest]') AND type in (N'U'))
BEGIN
CREATE TABLE [RestoreRequest](
	[RestoreRequestID] [int] NOT NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[SCN] [char](14) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[Result] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[RequestDate] [smalldatetime] NOT NULL,
	[ResultDate] [smalldatetime] NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [SerialList]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[SerialList]') AND type in (N'U'))
BEGIN
CREATE TABLE [SerialList](
	[SerialNo] [char](20) COLLATE Chinese_Taiwan_Stroke_CI_AS NOT NULL,
	[ItemInfo] [varchar](255) COLLATE Chinese_Taiwan_Stroke_CI_AS NOT NULL,
	[Parameter1] [varchar](255) COLLATE Chinese_Taiwan_Stroke_CI_AS NOT NULL,
	[Parameter2] [varchar](255) COLLATE Chinese_Taiwan_Stroke_CI_AS NOT NULL,
	[Type] [char](1) COLLATE Chinese_Taiwan_Stroke_CI_AS NOT NULL,
	[UsedFlag] [char](1) COLLATE Chinese_Taiwan_Stroke_CI_AS NOT NULL,
	[ExpireDate] [datetime] NOT NULL,
 CONSTRAINT [PK_SerialList] PRIMARY KEY CLUSTERED 
(
	[SerialNo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [StatusLog]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[StatusLog]') AND type in (N'U'))
BEGIN
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
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [temp_account]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[temp_account]') AND type in (N'U'))
BEGIN
CREATE TABLE [temp_account](
	[username] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[password] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[email] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[passkey] [varchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[date] [smalldatetime] NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [UpdateLog]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[UpdateLog]') AND type in (N'U'))
BEGIN
CREATE TABLE [UpdateLog](
	[UpdateLogID] [int] NOT NULL,
	[ManageID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[UpdateContent] [varchar](3000) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[LogDate] [smalldatetime] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [UserTicket]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[UserTicket]') AND type in (N'U'))
BEGIN
CREATE TABLE [UserTicket](
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[TicketNo] [char](12) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [WebLoginLog]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[WebLoginLog]') AND type in (N'U'))
BEGIN
CREATE TABLE [WebLoginLog](
	[WebLoginLogID] [int] NOT NULL,
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[LoginIP] [char](15) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[LoginDate] [smalldatetime] NOT NULL,
	[LoginSuccess] [char](1) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[AccessDeny] [bit] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [WebLoginRecentLog]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[WebLoginRecentLog]') AND type in (N'U'))
BEGIN
CREATE TABLE [WebLoginRecentLog](
	[AccountID] [char](20) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[LoginIP] [char](15) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[CntLoginFailure] [int] NOT NULL,
	[CheckDate] [smalldatetime] NOT NULL,
	[AccessDenyDate] [smalldatetime] NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [WebLoginReport]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[WebLoginReport]') AND type in (N'U'))
BEGIN
CREATE TABLE [WebLoginReport](
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
/****** Object:  Table [ZipCode]    Script Date: 20/02/2018 2:10:49 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[ZipCode]') AND type in (N'U'))
BEGIN
CREATE TABLE [ZipCode](
	[zipidx] [int] NOT NULL,
	[zipcode] [char](7) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[sido] [varchar](8) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[gugun] [varchar](11) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[dong] [varchar](41) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	[note1] [varchar](26) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[note2] [varchar](18) COLLATE SQL_Latin1_General_CP1_CI_AS NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[DF_MERC_rb]') AND type = 'D')
BEGIN
ALTER TABLE [Merc] ADD  CONSTRAINT [DF_MERC_rb]  DEFAULT ((0)) FOR [rb]
END

GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[DF_MERC_reset_rb]') AND type = 'D')
BEGIN
ALTER TABLE [Merc] ADD  CONSTRAINT [DF_MERC_reset_rb]  DEFAULT ((0)) FOR [reset_rb]
END

GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[FK_A3Web_Comment_A3Web_HTML]') AND parent_object_id = OBJECT_ID(N'[A3Web_Comment]'))
ALTER TABLE [A3Web_Comment]  WITH CHECK ADD  CONSTRAINT [FK_A3Web_Comment_A3Web_HTML] FOREIGN KEY([bil_post])
REFERENCES [A3Web_HTML] ([Bil])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[FK_A3Web_Comment_A3Web_HTML]') AND parent_object_id = OBJECT_ID(N'[A3Web_Comment]'))
ALTER TABLE [A3Web_Comment] CHECK CONSTRAINT [FK_A3Web_Comment_A3Web_HTML]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[FK_A3Web_Comment_Charac0]') AND parent_object_id = OBJECT_ID(N'[A3Web_Comment]'))
ALTER TABLE [A3Web_Comment]  WITH CHECK ADD  CONSTRAINT [FK_A3Web_Comment_Charac0] FOREIGN KEY([author])
REFERENCES [Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[FK_A3Web_Comment_Charac0]') AND parent_object_id = OBJECT_ID(N'[A3Web_Comment]'))
ALTER TABLE [A3Web_Comment] CHECK CONSTRAINT [FK_A3Web_Comment_Charac0]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[FK_A3Web_HTML_Charac0]') AND parent_object_id = OBJECT_ID(N'[A3Web_HTML]'))
ALTER TABLE [A3Web_HTML]  WITH CHECK ADD  CONSTRAINT [FK_A3Web_HTML_Charac0] FOREIGN KEY([Author])
REFERENCES [Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[FK_A3Web_HTML_Charac0]') AND parent_object_id = OBJECT_ID(N'[A3Web_HTML]'))
ALTER TABLE [A3Web_HTML] CHECK CONSTRAINT [FK_A3Web_HTML_Charac0]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[FK_Charac0_Account]') AND parent_object_id = OBJECT_ID(N'[Charac0]'))
ALTER TABLE [Charac0]  WITH CHECK ADD  CONSTRAINT [FK_Charac0_Account] FOREIGN KEY([c_sheadera])
REFERENCES [Account] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[FK_Charac0_Account]') AND parent_object_id = OBJECT_ID(N'[Charac0]'))
ALTER TABLE [Charac0] CHECK CONSTRAINT [FK_Charac0_Account]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[FK_CharInfo_Charac0]') AND parent_object_id = OBJECT_ID(N'[CharInfo]'))
ALTER TABLE [CharInfo]  WITH CHECK ADD  CONSTRAINT [FK_CharInfo_Charac0] FOREIGN KEY([CharName])
REFERENCES [Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[FK_CharInfo_Charac0]') AND parent_object_id = OBJECT_ID(N'[CharInfo]'))
ALTER TABLE [CharInfo] CHECK CONSTRAINT [FK_CharInfo_Charac0]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[FK_FRIEND0_Charac0]') AND parent_object_id = OBJECT_ID(N'[FRIEND0]'))
ALTER TABLE [FRIEND0]  WITH CHECK ADD  CONSTRAINT [FK_FRIEND0_Charac0] FOREIGN KEY([CharName])
REFERENCES [Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[FK_FRIEND0_Charac0]') AND parent_object_id = OBJECT_ID(N'[FRIEND0]'))
ALTER TABLE [FRIEND0] CHECK CONSTRAINT [FK_FRIEND0_Charac0]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[FK_Hsstonetable_Charac0]') AND parent_object_id = OBJECT_ID(N'[Hsstonetable]'))
ALTER TABLE [Hsstonetable]  WITH CHECK ADD  CONSTRAINT [FK_Hsstonetable_Charac0] FOREIGN KEY([MasterName])
REFERENCES [Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[FK_Hsstonetable_Charac0]') AND parent_object_id = OBJECT_ID(N'[Hsstonetable]'))
ALTER TABLE [Hsstonetable] CHECK CONSTRAINT [FK_Hsstonetable_Charac0]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[FK_Hstable_Charac0]') AND parent_object_id = OBJECT_ID(N'[Hstable]'))
ALTER TABLE [Hstable]  WITH CHECK ADD  CONSTRAINT [FK_Hstable_Charac0] FOREIGN KEY([MasterName])
REFERENCES [Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[FK_Hstable_Charac0]') AND parent_object_id = OBJECT_ID(N'[Hstable]'))
ALTER TABLE [Hstable] CHECK CONSTRAINT [FK_Hstable_Charac0]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[FK_Hstable_Hsstonetable]') AND parent_object_id = OBJECT_ID(N'[Hstable]'))
ALTER TABLE [Hstable]  WITH CHECK ADD  CONSTRAINT [FK_Hstable_Hsstonetable] FOREIGN KEY([MasterName])
REFERENCES [Hsstonetable] ([MasterName])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[FK_Hstable_Hsstonetable]') AND parent_object_id = OBJECT_ID(N'[Hstable]'))
ALTER TABLE [Hstable] CHECK CONSTRAINT [FK_Hstable_Hsstonetable]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[FK_ItemStorage_Charac0]') AND parent_object_id = OBJECT_ID(N'[ItemStorage]'))
ALTER TABLE [ItemStorage]  WITH CHECK ADD  CONSTRAINT [FK_ItemStorage_Charac0] FOREIGN KEY([c_id])
REFERENCES [Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[FK_ItemStorage_Charac0]') AND parent_object_id = OBJECT_ID(N'[ItemStorage]'))
ALTER TABLE [ItemStorage] CHECK CONSTRAINT [FK_ItemStorage_Charac0]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[FK_LETTERDB0_Charac0_receiver]') AND parent_object_id = OBJECT_ID(N'[LETTERDB0]'))
ALTER TABLE [LETTERDB0]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB0_Charac0_receiver] FOREIGN KEY([Receiver])
REFERENCES [Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[FK_LETTERDB0_Charac0_receiver]') AND parent_object_id = OBJECT_ID(N'[LETTERDB0]'))
ALTER TABLE [LETTERDB0] CHECK CONSTRAINT [FK_LETTERDB0_Charac0_receiver]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[FK_LETTERDB0_Charac0_sender]') AND parent_object_id = OBJECT_ID(N'[LETTERDB0]'))
ALTER TABLE [LETTERDB0]  WITH CHECK ADD  CONSTRAINT [FK_LETTERDB0_Charac0_sender] FOREIGN KEY([Sender])
REFERENCES [Charac0] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[FK_LETTERDB0_Charac0_sender]') AND parent_object_id = OBJECT_ID(N'[LETTERDB0]'))
ALTER TABLE [LETTERDB0] CHECK CONSTRAINT [FK_LETTERDB0_Charac0_sender]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[FK_Merc_Hsstonetable_hstable]') AND parent_object_id = OBJECT_ID(N'[Merc]'))
ALTER TABLE [Merc]  WITH CHECK ADD  CONSTRAINT [FK_Merc_Hsstonetable_hstable] FOREIGN KEY([MasterName])
REFERENCES [Hsstonetable] ([MasterName])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[FK_Merc_Hsstonetable_hstable]') AND parent_object_id = OBJECT_ID(N'[Merc]'))
ALTER TABLE [Merc] CHECK CONSTRAINT [FK_Merc_Hsstonetable_hstable]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[FK_RcvResult_Account]') AND parent_object_id = OBJECT_ID(N'[RcvResult]'))
ALTER TABLE [RcvResult]  WITH CHECK ADD  CONSTRAINT [FK_RcvResult_Account] FOREIGN KEY([AccountName])
REFERENCES [Account] ([c_id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[FK_RcvResult_Account]') AND parent_object_id = OBJECT_ID(N'[RcvResult]'))
ALTER TABLE [RcvResult] CHECK CONSTRAINT [FK_RcvResult_Account]
GO
IF NOT EXISTS (SELECT * FROM sys.check_constraints WHERE object_id = OBJECT_ID(N'[dbo].[CK_Account_alphabet]') AND parent_object_id = OBJECT_ID(N'[Account]'))
ALTER TABLE [Account]  WITH CHECK ADD  CONSTRAINT [CK_Account_alphabet] CHECK  ((NOT [c_id] like '%[^A-Z0-9]%'))
GO
IF  EXISTS (SELECT * FROM sys.check_constraints WHERE object_id = OBJECT_ID(N'[dbo].[CK_Account_alphabet]') AND parent_object_id = OBJECT_ID(N'[Account]'))
ALTER TABLE [Account] CHECK CONSTRAINT [CK_Account_alphabet]
GO
IF NOT EXISTS (SELECT * FROM sys.check_constraints WHERE object_id = OBJECT_ID(N'[dbo].[ck_No_Special_Characters]') AND parent_object_id = OBJECT_ID(N'[Charac0]'))
ALTER TABLE [Charac0]  WITH NOCHECK ADD  CONSTRAINT [ck_No_Special_Characters] CHECK NOT FOR REPLICATION ((NOT [c_id] like '%[^A-Z0-9]%'))
GO
IF  EXISTS (SELECT * FROM sys.check_constraints WHERE object_id = OBJECT_ID(N'[dbo].[ck_No_Special_Characters]') AND parent_object_id = OBJECT_ID(N'[Charac0]'))
ALTER TABLE [Charac0] CHECK CONSTRAINT [ck_No_Special_Characters]
GO
IF NOT EXISTS (SELECT * FROM sys.check_constraints WHERE object_id = OBJECT_ID(N'[dbo].[CK_Hstable_AlphaNumSpace]') AND parent_object_id = OBJECT_ID(N'[Hstable]'))
ALTER TABLE [Hstable]  WITH CHECK ADD  CONSTRAINT [CK_Hstable_AlphaNumSpace] CHECK  ((NOT [HSName] like '%[^A-Z0-9]%'))
GO
IF  EXISTS (SELECT * FROM sys.check_constraints WHERE object_id = OBJECT_ID(N'[dbo].[CK_Hstable_AlphaNumSpace]') AND parent_object_id = OBJECT_ID(N'[Hstable]'))
ALTER TABLE [Hstable] CHECK CONSTRAINT [CK_Hstable_AlphaNumSpace]
GO
